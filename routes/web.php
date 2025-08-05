<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Livewire\Draw;
use App\Livewire\Home;
use App\Livewire\Profile;
use App\Livewire\Settings;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
//
});

Route::middleware('auth')->group(function () {
    Route::get('/', Home::class)
        ->name('home');

    Route::get('/profile', Profile::class)
        ->name('profile');

    Route::get('/draw', Draw::class)
        ->name('draw');
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/settings', Settings::class)
        ->name('settings');
});

Route::get('/role', [UserController::class, 'assignRoleAndPermissions']);

require __DIR__ . '/auth.php';
require __DIR__ . '/finances.php';
