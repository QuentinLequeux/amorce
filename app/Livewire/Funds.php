<?php

namespace App\Livewire;

use App\Concerns\GetTotalByFundType;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Funds extends Component
{
    use GetTotalByFundType;
    use WithPagination;

    public $currentFund = 1;
    public User $user;
    public $totalGeneral;
    public $transactions;

    public function mount()
    {
        $this->user = auth()->user();
        $this->totalGeneral = Transaction::getTotalByFundId($this->currentFund);
    }

    public function updatedCurrentFund(): void
    {
//        dd($this->currentFund);
        $this->totalGeneral = Transaction::getTotalByFundId($this->currentFund);
        $this->resetPage();
    }

    public function render()
    {
//        dd('Current Fund:', $this->currentFund, 'Transactions:', Transaction::where('fund_id', $this->currentFund)->get());
        $user = auth()->user();
        $totalGeneral = Transaction::getTotalByFundId($this->currentFund);
//        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
        $transactions = Transaction::where('fund_id', $this->currentFund)->orderBy('date', 'ASC')->paginate(7);
        return view('livewire.funds', ['currentFund' => $this->currentFund], compact('user', 'totalGeneral', 'transactions'));
    }

//    public function show()
//    {
////        $this->user = auth()->user();
////        $transactions = Transaction::orderBy('date', 'desc')->paginate(7);
//        $this->transactions = Transaction::where('fund_id', $this->currentFund)->orderBy('date', 'ASC')->paginate(7);
//    }

    public function destroy(Transaction $transaction)
    {
        $this->authorize('delete', $transaction);

        $transaction->delete();

        return to_route('finances.general');
    }

    #[On('transactionDeleted')]
    public function resetTransactionList(): void
    {
        $totalGeneral = Transaction::getTotalByFundId(1);
        unset($totalGeneral);
    }
}
