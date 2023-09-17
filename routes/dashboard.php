<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'guest:admin',
], function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');

    Route::post('login', [LoginController::class, 'store']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])
        ->name('forgot-password');

    Route::post('forgot-password', [ForgotPasswordController::class, 'store']);

    Route::get('password-reset/{token}', [ResetPasswordController::class, 'create'])
        ->name('password-reset');

    Route::post('password-reset', [ResetPasswordController::class, 'store']);
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin'],
], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('logout');
});
