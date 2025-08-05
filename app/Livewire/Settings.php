<?php

namespace App\Livewire;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
//        $this->authorize('view');
        $user = auth()->user();
        return view('livewire.settings', compact('user'));
    }
}
