<?php

use App\Models\User;
use function Pest\Laravel\travel;

test('acces to login screen', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('user can authenticate', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
});

test('user cannot authenticate with wrong password', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('user cannot authenticate with wrong email', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => 'example@example.com',
        'password' => 'password',
    ]);

    $this->assertGuest();
});

test('user can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/login');
});

test('remember session', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
        'remember' => true,
    ]);

    $this->assertAuthenticated();

    $this->flushSession();

    $this->get('/home');
});

test('session expire after inactivity', function () {
    $user = User::factory()->create();

    $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
        'remember' => true,
    ]);

    $this->assertAuthenticated();

    travel(200)->minutes();

    $this->assertGuest();
});
