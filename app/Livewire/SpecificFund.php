<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class SpecificFund extends Component
{
    public function render()
    {
        $user = auth()->user();
        $totalGeneral = Transaction::getTotalByFundType('Fond spécifique');
//        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
        $transactions = Transaction::where('fund_type', 'fond spécifique')->paginate(7);

        return view('livewire.specific-fund', compact('user', 'transactions', 'totalGeneral'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return to_route('finances.specific');
    }
}
