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

    Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

    Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.store');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin'],
], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

    Route::get('orders', [\App\Http\Controllers\Admin\AdminOrdersController::class, 'index'])->name('orders');
    Route::post('orders/{order}', [\App\Http\Controllers\Admin\AdminOrdersController::class, 'reply'])->name('orders.reply');
    Route::resource('projects',ProjectController::class);
    Route::resource('contact', ContactController::class);

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
