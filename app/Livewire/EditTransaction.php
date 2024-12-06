<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditTransaction extends Component
{
    public $show = false;
    public Transaction $transaction;
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

    public function mount(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->date = $transaction->date;
        $this->description = $transaction->description;
        $this->donation_type = $transaction->donation_type;
        $this->fund_type = $transaction->fund_type;
        $this->amount = $transaction->amount;
    }

    public function render()
    {
        return view('livewire.edit-transaction');
    }

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

    public function update()
    {
        $this->authorize('update', $this->transaction);

        $this->validate();

//        dd($this->transaction, $this->date, $this->description, $this->donation_type, $this->fund_type, $this->amount);

        $this->transaction->update([
            'date' => $this->date,
            'description' => $this->description,
            'donation_type' => $this->donation_type,
            'fund_type' => $this->fund_type,
            'amount' => $this->amount,
        ]);

        $this->show = false;

        $this->dispatch('transactionDeleted');
    }

    #[On('showModal')]
    public function openModal($id)
    {
        $this->show = true;
        $this->transaction = Transaction::findOrFail($id);

        $this->date = $this->transaction->date;
        $this->description = $this->transaction->description;
        $this->donation_type = $this->transaction->donation_type;
        $this->fund_type = $this->transaction->fund_type;
        $this->amount = $this->transaction->amount;
    }
}
