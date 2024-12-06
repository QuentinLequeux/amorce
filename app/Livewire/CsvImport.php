<?php

namespace App\Livewire;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CsvImport extends Component
{
    use WithFileUploads;

    public $csv;

    public function render()
    {
        return view('livewire.csv-import');
    }

    public function import()
    {
        $this->validate([
            'csv' => 'required|file|mimes:csv|max:2048'
        ]);

        $csv = $this->csv->store('csv');

        $fullPath = storage_path('app/private/' . $csv);

        $row = 1;
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
