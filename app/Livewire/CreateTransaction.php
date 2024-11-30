<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTransaction extends Component
{
    //public Transaction $transaction;
    #[Validate]
    public $date;
    #[Validate]
    public $description;
    #[Validate]
    public $donation_type;
    #[Validate]
    public $fund_type;
    #[Validate]
    public $amount;

//    public function setTransaction($transaction)
//    {
//        $this->transaction = $transaction;
//        $this->date = $transaction->date;
//        $this->description = $transaction->description;
//        $this->donation_type = $transaction->donation_type;
//        $this->fund_type = $transaction->fund_type;
//        $this->amount = $transaction->amount;
//    }

    public function rules()
    {
        return [
            'date' => 'required',
            'description' => 'required|string|max:255',
            'donation_type' => 'required',
            'fund_type' => 'required',
            'amount' => 'required|numeric',
        ];
    }

//    public function render()
//    {
//        return view('livewire.create-transaction');
//    }

    public function store()
    {
        $this->validate();

        Transaction::create([
            'date' => $this->date,
            'description' => $this->description,
            'donation_type' => $this->donation_type,
            'fund_type' => $this->fund_type,
            'amount' => $this->amount,
        ]);

//        $this->dispatch('close');

        return redirect(route('finances.general'));
    }
}
