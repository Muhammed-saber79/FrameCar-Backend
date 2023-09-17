<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('forgot-password');

    Route::post('forgot-password', [ForgotPasswordController::class, 'store']);

    Route::get('password-reset/{token}', [ResetPasswordController::class, 'create'])
        ->name('password-reset');

    Route::post('password-reset', [ResetPasswordController::class, 'store']);
});

Route::group([
    'middleware' => 'auth',
    'as' => 'auth.'
], function () {
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});
