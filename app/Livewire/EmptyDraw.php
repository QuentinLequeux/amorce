<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class EmptyDraw extends Component
{
    public $show = false;

    public function render()
    {
        return view('livewire.empty-draw');
    }

    #[On('emptyDraw')]
    public function emptyDraw()
    {
        $this->show = true;
    }

    public function randomDraw()
    {
        $this->dispatch('randomDraw');

        $this->show = false;
    }
}
