<?php

namespace App\Livewire;

use App\Models\CsvHash;
use App\Models\Donators;
use App\Models\Fund;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CsvImport extends Component
{
    use WithFileUploads;

    public $csv;
    public $fileSize;

    public function render()
    {
        return view('livewire.csv-import');
    }

    public function updatedCsv()
    {
        if ($this->csv) {
            $this->fileSize = number_format($this->csv->getSize() / 1024, 2);
        }
    }

    public function import()
    {
        $this->authorize('create', Transaction::class);

        if (!$this->csv) {
//            dd('Aucun fichier');
            return null;
        }

        $this->validate([
            'csv' => 'required|file|mimes:csv|max:2048'
        ]);

//        $csv = $this->csv->store('csv');
//
//        $fullPath = storage_path('app/private/' . $csv);

//        $fileContent = file_get_contents($fullPath);

        $temporaryPath = $this->csv->getRealPath();

        $fileContent = '';

//        dd($temporaryPath);

        if (($handle = fopen($temporaryPath, 'r')) !== FALSE) {
            $line = fgetcsv($handle, 1000, ',');
            $fileContent .= implode(',', $line) . "\n"; // Concaténer les colonnes avec des virgules et ajouter une nouvelle ligne
            fclose($handle);
        }

        $hash = md5($fileContent);

        if (CsvHash::where('hash', $hash)->exists()) {
//            dd('Existe déja');
            $this->dispatch('showError');
            return null;
        }

        CsvHash::create([
            'hash' => $hash,
        ]);

        $generalFund = Fund::where('name', 'Fond général')->first();

        if (($handle = fopen($temporaryPath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $date = Carbon::createFromFormat('d-m-Y', $data[0])->format('Y-m-d');
                $yearMonth = Carbon::createFromFormat('d-m-Y', $data[0])->format('m-Y');
//                $month = Carbon::createFromFormat('d-m-Y', $data[0])->format('m');
                $iban = $data[3];
                $name = $data[5];
                $amount = str($data[2])->replace(',', '')->replace('.', '');

                if (!empty($iban)) {
                    $donor = Donators::updateOrCreate(
                        ['iban' => $iban],
                        ['name' => $name]
                    );

                    $history = $donor->history ? json_decode($donor->history, true) : [];
//                    \Log::info('Type of history:', ['type' => gettype($history)]);
//                    $history[] = ['date' => date(format: 'Y-m'), strtotime($date)];

                    $newEntry = [$yearMonth];

                    if (!in_array($newEntry, $history)) {
                        $history[] = $newEntry;
                    }

                    if (count($history) > 3) {
                        array_shift($history);
                    }

                    $donor->update([
                        'history' => json_encode($history),
                    ]);
                }

                Transaction::create([
                    'date' => $date,
                    'amount' => $amount,
                    'description' => $data[8],
                    'fund_id' => $generalFund->id,
                ]);
            }
            fclose($handle);
        }

        $this->dispatch('importFinished');

        session()->flash('message', 'Data imported successfully.');

        return $this->redirect(route('finances'), navigate: true);
    }
}
