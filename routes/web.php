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

})->name('site');

require __DIR__.'/dashboard.php';

Route::resource('contact',ContactController::class);

#######################admin routes ###################



// Route::group(['prefix'=>'admin','middleware'],function(){

//     Route::get('/', function () {
//         return view('admin.index');
//     })->name('admin_home');

//     Route::resource('projects',ProjectController::class);
    

// });
require __DIR__.'/auth.php';

require __DIR__.'/userDashboard.php';
