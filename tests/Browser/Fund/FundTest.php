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

test('user can add a transaction', function () {
    Role::create(['name' => 'admin']);

    $user = User::factory()->create([
        'email' => 'quent690@yahoo.fr',
        'password' => bcrypt('password'),
    ]);

    $user->assignRole('admin');

    $this->browse(function (Browser $browser) use ($user) {
        $browser->loginAs($user)
                ->visit('/finances')
                ->click('@create-transaction')
                ->waitFor('@transaction-modal')
                ->assertSeeIn('@transaction-modal', 'Ajouter')
                ->type('date', '2025-08-25')
                //->assertInputValue('date', '2025-08-25')
                ->type('description', 'test')
                ->select('donation_type', 'Liquide')
                ->assertSelected('donation_type', 'Liquide')
                ->select('fund_id', '2')
                ->assertSelected('fund_id', '2')
                ->type('amount', '10')
                ->click('@button-transaction')
                ->assertPathIs('/finances');
    });
});
