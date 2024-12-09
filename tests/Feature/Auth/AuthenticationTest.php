<?php

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Models\User;

test('acces to login screen', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('user can authenticate', function () {
    $this->withoutMiddleware(VerifyCsrfToken::class);

    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    // dump($response);

    //dump($response->getStatusCode());

    $this->assertAuthenticated();
    $response->assertRedirect(route('home'));
});
