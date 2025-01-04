<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Livewire\Draw;
use App\Livewire\Settings;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
//
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/profile', [ProfileController::class, 'index'])
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
