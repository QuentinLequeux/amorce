<?php

namespace App\Livewire;

use App\Models\Fund;
use Livewire\Component;
use App\Models\Transaction;

class Home extends Component
{
    public function render()
    {
        $user = auth()->user();
        $funds = Fund::all();
        foreach ($funds as $fund) {
            $fund->total = Transaction::getTotalByFundId($fund->id);
        }
        return view('livewire.home', compact('user', 'funds'));
    }
}
