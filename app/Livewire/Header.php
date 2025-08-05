<?php

namespace App\Livewire;

use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        $user = auth()->user();
        return view('livewire.header', compact('user'));
    }
}
