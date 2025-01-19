<?php

namespace App\Livewire;

use Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Profile extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function render()
    {
        $user = auth()->user();
        return view('livewire.profile', compact('user'));
    }

    public function updatePassword(): null
    {
        $user = auth()->user();

        $this->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user->update(['password' => Hash::make($this->password),
        ]);

        return $this->redirect(route('home'));
    }
}
