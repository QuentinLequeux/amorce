<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OperatingFund extends Component
{
    public function render()
    {
        $user = auth()->user();
        $totalGeneral = Transaction::getTotalByFundId(2);
//        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
        $transactions = Transaction::where('fund_id', 2)->paginate(7);
        $routeName = 'finances.operating.destroy';

        return view('livewire.operating-fund', compact('user', 'totalGeneral', 'transactions', 'routeName'));
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return to_route('finances.operating');
    }
}
