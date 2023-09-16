<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::group([
    'middleware' => 'guest',
    'as' => 'auth.'
], function () {
    Route::get('register', [RegisterController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('login', [LoginController::class, 'store']);

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});

Route::group([
    'middleware' => 'auth',
    'as' => 'auth.'
], function () {
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});
