<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\User\PaymentController;
use App\Models\Project;
use Illuminate\Http\Request;
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
    $projects = Project::all();
    return view('site.index', compact('projects'));
})->name('site');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/userDashboard.php';



##################### Test Payment Gateway #####################
Route::get('pay/{order_id}',[PaymentController::class ,'pay']);


Route::get('/pay_callback',[PaymentController::class , 'pay_callback'])->name('pay_callback');
##################### Test Payment Gateway #####################








