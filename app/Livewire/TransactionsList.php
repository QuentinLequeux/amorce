<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class TransactionsList extends Component
{
    public $fundType = 'Fond général';
    public $transaction;
    public $sortField = 'date';
    public $sortDirection = 'desc';

    public function mount()
    {
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        // Charger les transactions avec tri dynamique
        $this->transaction = Transaction::orderBy($this->sortField, $this->sortDirection)->get();
    }

    public function sortBy($field)
    {
        // Si le champ cliqué est déjà celui qui est trié, inverser la direction
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'desc'; // Réinitialiser la direction à ascendant
        }

        $this->loadTransactions();
    }

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
