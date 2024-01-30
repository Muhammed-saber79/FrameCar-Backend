<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OrderController;

Route::group([
    'middleware' => ['auth'],
], function () {
   Route::get('user-dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

   Route::group([
       'prefix' => 'order',
       'as' => 'order.'
   ], function () {
       Route::post('store', [OrderController::class, 'store'])->name('store');
       Route::get('edit/{id}', [OrderController::class, 'edit'])->name('edit');
       Route::put('order/{id}', [OrderController::class, 'update'])->name('update');
       Route::delete('delete/{id}', [OrderController::class, 'destroy'])->name('destroy');
   });
});
