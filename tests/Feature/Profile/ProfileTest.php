<?php

use App\Models\User;
use App\Livewire\Profile;
use function Pest\Laravel\actingAs;

beforeEach(function () {
   $this->user = User::factory()->create();
});

test('user can edit his name', function () {
    actingAs($this->user);

    Livewire::test(Profile::class)
        ->set('name', 'John Doe')
        ->call('updateName');

    expect($this->user->name)->toBe('John Doe');
    //$this->assertDatabaseHas('users', [
    //   'name' => 'John Doe',
    //]);
});

test('user can edit his email', function () {
   actingAs($this->user);

   Livewire::test(Profile::class)
       ->set('email', 'test@example.com')
       ->call('updateEmail');

   expect($this->user->email)->toBe('test@example.com');
});

test('user can edit his password', function () {
   actingAs($this->user);

   Livewire::test(Profile::class)
       ->set('current_password', 'password')
       ->set('password', 'secret123');

   expect($this->user->password)->toBe('secret123');
});

test('user can delete his account', function () {
    actingAs($this->user);

    Livewire::test(Profile::class)
        ->call('delete');

    $this->assertDatabaseMissing('users', [
        'id' => $this->user->id,
    ]);
});
