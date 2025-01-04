<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class TransactionSearch extends Component
{
    public $search = '';

//    public function render()
//    {
//        return view('livewire.transaction-search', ['transactions' => Transaction::search('description', $this->search)]);
//    }

    public function render()
    {
        $transactions = Transaction::where('description', 'like', '%' . $this->search . '%')
            ->orWhere('amount', 'like', '%' . $this->search . '%')
            ->orWhere('donation_type', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.transaction-search', compact('transactions'));
    }
}
