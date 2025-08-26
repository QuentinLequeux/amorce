<?php

namespace App\Livewire;

use App\Models\Fund;
use Livewire\Component;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

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
    public $fund_id;
    #[Validate]
    public $amount;
    public $funds;

    public function render()
    {
        return view('livewire.edit-transaction', [
            'funds' => $this->funds,
        ]);
    }

    public function mount(Transaction $transaction): void
    {
        $this->transaction = $transaction;
        $this->date = $transaction->date;
        $this->description = $transaction->description;
        $this->donation_type = $transaction->donation_type;
        $this->fund_id = $transaction->fund_id;
        $this->amount = $transaction->amount;
        $this->funds = Fund::all();
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'donation_type' => 'required',
            'fund_id' => 'required',
            'amount' => 'required|numeric',
        ];
    }

    public function update(): void
    {
        $this->authorize('update', $this->transaction);

        $this->validate();

        if ($this->donation_type === 'Transfert') {
            $this->transaction->update([
                'date' => $this->date,
                'description' => $this->description,
                'donation_type' => $this->donation_type,
                'fund_id' => $this->transaction->fund_id,
                'amount' => -abs($this->amount),
            ]);

            Transaction::create([
                'date' => $this->date,
                'description' => $this->description,
                'donation_type' => $this->donation_type,
                'fund_id' => $this->fund_id,
                'amount' => abs($this->amount),
            ]);
        } else {
            $this->transaction->update([
                'date' => $this->date,
                'description' => $this->description,
                'donation_type' => $this->donation_type,
                'fund_id' => $this->fund_id,
                'amount' => $this->amount,
            ]);
        }

        $this->show = false;

        $this->dispatch('transactionDeleted');

        $this->redirect(route('finances'));
    }

    #[On('showModal')]
    public function openModal($id): void
    {
        $this->show = true;
        $this->transaction = Transaction::findOrFail($id);

        $this->date = $this->transaction->date;
        $this->description = $this->transaction->description;
        $this->donation_type = $this->transaction->donation_type;
        $this->fund_id = $this->transaction->fund_id;
        $this->amount = $this->transaction->amount / 100;
    }
}
