<?php

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

test('acces to home page', function () {
    actingAs($this->user);

    $response = $this->get(route('home'));

    $response->assertStatus(200);
});

test('acces to general finances', function () {
    actingAs($this->user);

    $response = $this->get(route('finances.general'));

    $response->assertStatus(200);
});

test('acces to operating finances', function () {
    actingAs($this->user);

    $response = $this->get(route('finances.operating'));

    $response->assertStatus(200);
});

test('acces to specific finances', function () {
    actingAs($this->user);

    $response = $this->get(route('finances.specific'));

    $response->assertStatus(200);
});

test('a user can delete transaction', function () {
    actingAs($this->user);

    $transaction = Transaction::factory()->create();

    $response = $this->delete(route('finances.general.destroy', $transaction));

    $response->assertRedirect(route('finances.general'));
});

test('a user cant delete transaction', function () {
    $role = Role::create(['name' => 'user']);
    $this->user = User::factory()->create();
    $this->user->assignRole($role);

    $transaction = Transaction::factory()->create();

    $response = $this->delete(route('finances.general.destroy', $transaction));

    $response->assertStatus(403);
});
