<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth/login');
    });

    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/forgot-password', function () {
        return view('auth/forgot-password');
    });

    Route::post('/forgot-password', []);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});
