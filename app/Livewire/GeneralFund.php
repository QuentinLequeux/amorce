<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class GeneralFund extends Component
{
    public function render()
    {
        $user = auth()->user();
        $totalGeneral = Transaction::getTotalByFundType('Fond général');
//        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
        $transactions = Transaction::where('fund_type', 'Fond général')->orderBy('date', 'ASC')->paginate(7);
        return view('livewire.general-fund', compact('user', 'totalGeneral', 'transactions'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return to_route('finances.general');
    }

    #[On('transactionDeleted')]
    public function resetTransactionList()
    {
        $totalGeneral = Transaction::getTotalByFundType('Fond général');
        unset($totalGeneral);
    }
}
