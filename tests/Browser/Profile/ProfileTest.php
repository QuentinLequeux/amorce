<?php

use App\Models\User;
use Laravel\Dusk\Browser;

test('user can update his password', function () {
    $user = User::factory()->create([
        'email' => 'quent690@yahoo.fr',
        'password' => bcrypt('password'),
    ]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser->loginAs($user)
                ->visit('/profile')
                ->type('current-password', 'password')
                ->type('password', 'secret')
                ->type('new-password', 'secret')
                ->click('@modify-password')
                ->assertPathIs('/profile');
    });
});

test('user can update his email', function () {
    $user = User::factory()->create([
        'email' => 'quent690@yahoo.fr',
        'password' => bcrypt('password'),
    ]);

    $this->browse(function (Browser $browser) use ($user) {
        $browser->loginAs($user)
                ->visit('/profile')
                ->type('email', 'test@example.com')
                ->click('@modify-email')
                ->assertPathIs('/profile');
    });
});
