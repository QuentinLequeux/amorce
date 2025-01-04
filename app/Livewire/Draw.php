<?php

namespace App\Livewire;

use Livewire\Component;

class Draw extends Component
{
    public function render()
    {
        $user = auth()->user();

        return view('livewire.draw', compact('user'));
    }
}
