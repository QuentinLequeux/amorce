<?php

use Laravel\Dusk\Browser;

test('user can reset password', function () {

    $this->browse(function (Browser $browser) {
       $browser->visit('/forgot-password')
                ->type('email', 'quent789@gmail.com')
                ->press('Envoyer')
                ->assertPathIs('/forgot-password');
    });
});
