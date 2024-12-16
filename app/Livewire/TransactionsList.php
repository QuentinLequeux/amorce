<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Models\Transaction;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[AllowDynamicProperties]
class TransactionsList extends Component
{
    use WithPagination;

    public $fundId = 3;
    public $transaction;
    public $sortField = 'date';
    public $sortDirection = 'desc';
    public $perPage = 7;
    public $search = '';

    public function mount()
    {
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        // Charger les transactions avec tri dynamique
        $this->transactions = Transaction::where('fund_id', $this->fundId)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);
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
        return Transaction::search(['description', 'amount', 'date', 'donation_type'], $this->search)->paginate($this->perPage);
//        return Transaction::where('fund_id', $this->fundId)
//            ->orderBy('date', 'desc')
//            ->paginate(7);
    }

    public function render()
    {
//        sleep(1);
        return view('livewire.transactions-list');
        //, ['transactions' => Transaction::search('description', $this->search)->paginate(10),]
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
