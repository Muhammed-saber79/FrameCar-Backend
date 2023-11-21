<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
        $usersCount = User::count();
        $ordersCount = Order::count();
        $projectsCount = Project::count();

        return view('admin.index', compact('usersCount', 'ordersCount', 'projectsCount'));
    })->name('index');

    Route::get('orders', [\App\Http\Controllers\Admin\AdminOrdersController::class, 'index'])->name('orders');
    Route::delete('order_delete/{id}', [\App\Http\Controllers\User\OrderController::class, 'destroy'])->name('order_delete');
    Route::post('orders/{order}', [\App\Http\Controllers\Admin\AdminOrdersController::class, 'reply'])->name('orders.reply');
    Route::resource('projects',ProjectController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('users', UserController::class);

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
