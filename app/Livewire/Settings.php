<?php

namespace App\Livewire;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        $user = auth()->user();
        return view('livewire.settings', compact('user'));
    }
}
