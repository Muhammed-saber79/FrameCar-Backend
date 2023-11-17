<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
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

  $client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.tap.company/v2/charges/'.request()->tap_id , [
  'headers' => [
    'Authorization' => 'Bearer sk_test_ePhj1rK6ptA2GgQITMwmc30L',
    'accept' => 'application/json',
  ],
]);
  return json_decode($response->getBody()) ;
    return view('site.index');
})->name('site');

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
require __DIR__.'/userDashboard.php';



##################### Test Payment Gateway #####################
Route::get('pay/{amount}',function($amount){

    $client = new \GuzzleHttp\Client();

    $response = $client->request('POST', 'https://api.tap.company/v2/charges', [
      'body' => json_encode([
          'amount' => $amount,
          'currency' => 'SAR',
          'customer_initiated' => true,
          'threeDSecure' => true,
          'save_card' => false,
          'description' => 'Test Description',
          'metadata' => ['udf1' => 'Metadata 1'],
          'reference' => ['transaction' => 'txn_01', 'order' => 'ord_01'],
          'receipt' => ['email' => true, 'sms' => true],
          'customer' => [
              'first_name' => 'test',
              'middle_name' => 'test',
              'last_name' => 'test',
              'email' => 'test@test.com',
              'phone' => ['country_code' => 965, 'number' => 51234567],
          ],
          'source' => ['id' => 'src_all'],
          'post' => ['url' => 'http://your_website.com/post_url'],
          'redirect' => ['url' => route('pay_callback')],
      ]),
      'headers' => [
          'Authorization' => 'Bearer sk_test_ePhj1rK6ptA2GgQITMwmc30L',
          'accept' => 'application/json',
          'content-type' => 'application/json',
      ],
  ]);


$data= json_decode($response->getBody());

return redirect()->to($data->transaction->url)  ;
});


Route::get('/pay_callback', function () {

  $client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.tap.company/v2/charges/'.request()->tap_id , [
  'headers' => [
    'Authorization' => 'Bearer sk_test_ePhj1rK6ptA2GgQITMwmc30L',
    'accept' => 'application/json',
  ],
]);
  return json_decode($response->getBody()) ;
})->name('pay_callback');


##################### Test Payment Gateway #####################








