<?php

use Laravel\Dusk\Browser;

test('user can login', function () {

    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
                ->type('email', 'quent789@gmail.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/');
    });
});
