<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::group([
    'prefix' => '/admin/',
    'as' => 'admin.',
    'middleware' => ['guest'],
], function () {
    Route::get('login', [LoginController::class, 'create'])
        ->name('login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::group([
    'prefix' => '/admin',
    'as' => 'admin.',
    'middleware' => ['auth:admin'],
], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('index');

});
