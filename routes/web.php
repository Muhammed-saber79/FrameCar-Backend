<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('site.index');
})->name('user_home');


Route::resource('contact',ContactController::class);

#######################admin routes ###################



Route::group(['prefix'=>'admin'],function(){

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin_home');

    Route::resource('projects',ProjectController::class);
    

});