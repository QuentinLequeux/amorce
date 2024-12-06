<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteModal extends Component
{
    public $show = false;
    public $transactionId;

    #[On('openmodal')]
    public function showModal($id)
    {
        $this->transactionId = $id;
        $this->show = true;
    }

    public function destroy(Transaction $transaction)
    {
//        $user = auth()->user();
//
//        if (!$user->hasRole('admin')) {
//            abort(403,'Not allowed');
//        }
//        dd($this->transactionId);
        $this->authorize('delete', $transaction);

        Transaction::find($this->transactionId)->delete();
        $this->dispatch('transactionDeleted');
//        $transaction = Transaction::all();
//        $transaction = Transaction::find($transaction->id);
//        $transaction->delete();
//        return to_route('finances.operating');
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
