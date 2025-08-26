<?php

use App\Models\User;
use Laravel\Dusk\Browser;

test('user can launch a draw', function () {
    $user = User::factory()->create([
        'email' => 'quent690@yahoo.fr',
        'password' => bcrypt('password'),
    ]);

    $this->browse(function (Browser $browser) use ($user) {
       $browser->loginAs($user)
                ->visit('/draw')
                ->assertSee('Tirage au sort')
                ->click('@draw-button')
                ->waitFor('@draw-modal')
                ->assertSeeIn('@draw-modal','Oui')
                ->click('@draw-yes-button')
                ->pause(1000)
                ->assertPathIs('/draw');
    });
});
