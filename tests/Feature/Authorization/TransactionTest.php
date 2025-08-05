<?php

use App\Livewire\CreateTransaction;
use App\Livewire\CsvImport;
use App\Livewire\EditTransaction;
use App\Models\Fund;
use App\Models\Transaction;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $permission = Permission::create(['name' => 'delete-transaction']);
    $role = Role::create(['name' => 'admin']);
    $role->givePermissionTo($permission);
    $this->user = User::factory()->create();
    $this->user->assignRole($role);
});

test('a user with admin role can delete transaction', function () {
    actingAs($this->user);

    Fund::factory()->create();

    $transaction = Transaction::factory()->create();

    $response = $this->delete(route('finances.general.destroy', $transaction));

    $response->assertRedirect(route('finances'));
});

test('a user with admin role can modify transaction', function () {
//    $role = Role::create(['name' => 'admin']);
//    $user = User::factory()->create();
//    $user->assignRole($role);

    Fund::factory()->create();

    $transaction = Transaction::factory()->create();

    Livewire::actingAs($this->user)
        ->test(EditTransaction::class)
        ->call('update', $transaction->id)
        ->assertStatus(200);
});

test('a user without admin role cant delete transaction', function () {
    $role = Role::create(['name' => 'user']);
    $user = User::factory()->create();
    $user->assignRole($role);

    Fund::factory()->create();

    $transaction = Transaction::factory()->create();

    Livewire::actingAs($user)
        ->test(\App\Livewire\Funds::class)
        ->call('destroy', $transaction->id)
        ->assertForbidden();
});

test('a user without admin role cant modify transaction', function () {
    $role = Role::create(['name' => 'user']);
    $user = User::factory()->create();
    $user->assignRole($role);

    Fund::factory()->create();

    $transaction = Transaction::factory()->create();

    Livewire::actingAs($user)
        ->test(EditTransaction::class)
        ->call('update', $transaction->id)
        ->assertForbidden();
});

test('a user with admin role can import csv', function () {
    Livewire::actingAs($this->user)
        ->test(CsvImport::class)
        ->call('import')
        ->assertStatus(200);
});

test('a user without admin role cant import csv', function () {
    $role = Role::create(['name' => 'user']);
    $user = User::factory()->create();
    $user->assignRole($role);

    Livewire::actingAs($user)
        ->test(CsvImport::class)
        ->call('import')
        ->assertForbidden();
});

test('a user with admin role can create transaction', function () {
    Livewire::actingAs($this->user)
        ->test(CreateTransaction::class)
        ->call('store')
        ->assertStatus(200);
});

test('a user without admin role cant create transaction', function () {
    $role = Role::create(['name' => 'user']);
    $user = User::factory()->create();
    $user->assignRole($role);

    Livewire::actingAs($user)
        ->test(CreateTransaction::class)
        ->call('store')
        ->assertForbidden();
});
