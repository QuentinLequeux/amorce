<?php

use App\Livewire\GeneralFund;
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

test('access to home page', function () {
    actingAs($this->user);

    $response = $this->get(route('home'));

    $response->assertStatus(200);
});

test('access to general finances', function () {
    actingAs($this->user);

    $response = $this->get(route('finances.general'));

    $response->assertStatus(200);
});

test('access to operating finances', function () {
    actingAs($this->user);

    $response = $this->get(route('finances.operating'));

    $response->assertStatus(200);
});

test('access to specific finances', function () {
    actingAs($this->user);

    $response = $this->get(route('finances.specific'));

    $response->assertStatus(200);
});

test('access to settings', function () {
    actingAs($this->user);

    $response = $this->get(route('settings'));

    $response->assertStatus(200);
});

test('dont have access to settings', function () {
    $role = Role::create(['name' => 'user']);
    $user = User::factory()->create();
    $user->assignRole($role);

    $response = $this->get(route('settings'));

    $response->assertStatus(403);
});
