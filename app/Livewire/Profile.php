<?php

namespace App\Livewire;

use Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;

class Profile extends Component
{
    public $password;
    public string $email;
    public $current_password;
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

        session()->flash('success', 'Votre mot de passe a été modifié.');

        return $this->redirect(route('profile'));
    }

    public function updateEmail()
    {
        $user = auth()->user();

        $this->validate([
            'email' => ['required', 'email']
        ]);

        $user->update([
            'email' => $this->email
        ]);

        session()->flash('success', 'Votre adresse email a été modifiée.');

        return $this->redirect(route('profile'));
    }
}
