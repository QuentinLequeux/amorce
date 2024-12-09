<?php

namespace App\Livewire;

use App\Models\CsvHash;
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
        if (!$this->csv) {
            dd('Aucun fichier');
        }

        $this->validate([
            'csv' => 'required|file|mimes:csv|max:2048'
        ]);

        $csv = $this->csv->store('csv');

        $fullPath = storage_path('app/private/' . $csv);

//        $fileContent = file_get_contents($fullPath);

        if (($handle = fopen($fullPath, 'r')) !== FALSE) {
            $firstLine = fgetcsv($handle, 1000, ',');
            fclose($handle);
        }

        $hash = md5(implode(',', $firstLine));

//        $hash = md5($fileContent);

        if (CsvHash::where('hash', $hash)->exists()) {
            dd('Existe déja');
        }

        CsvHash::create([
            'hash' => $hash,
        ]);

        if (($handle = fopen($fullPath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $date = Carbon::createFromFormat('d-m-Y', $data[0])->format('Y-m-d');
                $amount = str($data[2])->replace(',', '')->replace('.', '');

                Transaction::create([
                    'date' => $date,
                    'amount' => $amount,
                    'description' => $data[8],
                    'fund_type' => 'Fond général'
                ]);
            }
            fclose($handle);
        }

        $this->dispatch('importFinished');

        session()->flash('message', 'Data imported successfully.');

        return $this->redirect(route('finances.general'), navigate: true);
    }
}
