<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class SpecificFund extends Component
{
    public function render()
    {
        $user = auth()->user();
        $totalGeneral = Transaction::getTotalByFundId(3);
//        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
        $transactions = Transaction::where('fund_id', 3)->paginate(7);

        return view('livewire.specific-fund', compact('user', 'transactions', 'totalGeneral'));
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return to_route('finances.specific');
    }
}
