<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        $user = auth()->user();
        return view('livewire.profile', compact('user'));
    }
}
