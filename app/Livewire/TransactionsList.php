<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TransactionsList extends Component
{
    public $fundType = 'Fond général';

    #[Computed]
    public function transactions()
    {
        return Transaction::where('fund_type', $this->fundType)
            ->orderBy('date', 'desc')
            ->paginate(7);
    }

    public function render()
    {
        return view('livewire.transactions-list');
    }

    public function destroy(Transaction $transaction)
    {
//        $transaction = Transaction::find($transaction->id);
        $transaction->delete();
//        return to_route('finances.operating');
    }
    #[On('transactionDeleted')]
    public function resetTransactionList()
    {
        unset($this->transactions);
    }
}
