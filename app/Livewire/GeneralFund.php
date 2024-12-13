<?php

namespace App\Livewire;

use App\Concerns\GetTotalByFundType;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class GeneralFund extends Component
{
    use GetTotalByFundType;

    public function render()
    {
        $user = auth()->user();
        $totalGeneral = Transaction::getTotalByFundId(1);
//        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
        $transactions = Transaction::where('fund_id', 1)->orderBy('date', 'ASC')->paginate(7);
        return view('livewire.general-fund', compact('user', 'totalGeneral', 'transactions'));
    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return to_route('finances.general');
    }

    #[On('transactionDeleted')]
    public function resetTransactionList()
    {
        $totalGeneral = Transaction::getTotalByFundId(1);
        unset($totalGeneral);
    }
}
