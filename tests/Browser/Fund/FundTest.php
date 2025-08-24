<?php

use App\Models\User;
use Laravel\Dusk\Browser;
use Spatie\Permission\Models\Role;

test('user can create a new fund', function () {
    Role::create(['name' => 'admin']);

    $user = User::factory()->create([
        'email' => 'quent690@yahoo.fr',
        'password' => bcrypt('password'),
    ]);

    $user->assignRole('admin');

    $this->browse(function (Browser $browser) use ($user) {
       $browser->loginAs($user)
                ->visit('/finances')
                ->click('@create-button')
                ->waitFor('@create-modal')
                ->assertSeeIn('@create-modal', 'Créer')
                ->type('name', 'Fond d\'épargne')
                ->click('@confirm-button')
                ->assertPathIs('/finances');
    });
});

test('user can add csv file', function () {
    Role::create(['name' => 'admin']);

    $user = User::factory()->create([
        'email' => 'quent690@yahoo.fr',
        'password' => bcrypt('password'),
    ]);

    $user->assignRole('admin');

    $this->browse(function (Browser $browser) use ($user) {
       $browser->loginAs($user)
                ->visit('/finances')
                ->click('@import-csv')
                ->waitFor('@modal-csv')
                ->assertSeeIn('@modal-csv', 'Envoyer')
                ->attach('@csv-input', base_path('tests/Browser/files/historique-amorce.csv'))
                ->click('@csv-button')
                ->assertPathIs('/finances');
    });
});
