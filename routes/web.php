<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
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

Route::resource('contact', ContactController::class);

#######################admin routes ###################


Route::get('testPay',function(){

    $client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.tap.company/v2/charges', [
  'body' => '{"amount":1,"currency":"KWD","customer_initiated":true,"threeDSecure":true,"save_card":false,"description":"Test Description","metadata":{"udf1":"Metadata 1"},"reference":{"transaction":"txn_01","order":"ord_01"},"receipt":{"email":true,"sms":true},"customer":{"first_name":"test","middle_name":"test","last_name":"test","email":"test@test.com","phone":{"country_code":965,"number":51234567}},"source":{"id":"src_all"},"post":{"url":"http://your_website.com/post_url"},"redirect":{"url":"http://127.0.0.1:8000/user-dashboard"}}',
  'headers' => [
    'Authorization' => 'Bearer sk_test_XKokBfNWv6FIYuTMg5sLPjhJ',
    'accept' => 'application/json',
    'content-type' => 'application/json',
  ],
]);

$data= json_decode($response->getBody());

return redirect()->to($data->transaction->url)  ;
});
// Route::group(['prefix'=>'admin','middleware'],function(){

//     Route::get('/', function () {
//         return view('admin.index');
//     })->name('admin_home');

     Route::resource('projects',ProjectController::class);


// });
require __DIR__.'/auth.php';

require __DIR__.'/userDashboard.php';










