<?php

use App\Http\Controllers\DrawController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    Route::get('/draw', [DrawController::class, 'index'])
        ->name('draw');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/finances.php';
