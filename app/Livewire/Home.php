<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $user = auth()->user();
        return view('livewire.home', compact('user'));
    }
}
