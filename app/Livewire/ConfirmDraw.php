<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ConfirmDraw extends Component
{
    public $show = false;

    public function render()
    {
        return view('livewire.confirm-draw');
    }

    #[On('confirmDraw')]
    public function confirmDraw()
    {
        $this->show = true;
    }
}
