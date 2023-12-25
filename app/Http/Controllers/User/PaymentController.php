<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay($order_id){
        $order= Order::findOrFail($order_id);
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://api.tap.company/v2/charges', [
          'body' => json_encode([
              'amount' => $order->cost,
              'currency' => 'SAR',
              'customer_initiated' => true,
              'threeDSecure' => true,
              'save_card' => false,
              'description' => 'Test Description',
              'metadata' => ['udf1' => 'Metadata 1'],
              'reference' => ['transaction' => 'txn_01', 'order' => $order_id],
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
              'Authorization' => 'Bearer sk_live_ON351hpWE2eJ8mFwgtSH60Kz',
              'accept' => 'application/json',
              'content-type' => 'application/json',
          ],
      ]);
    
    
    $data= json_decode($response->getBody());
    
    return redirect()->to($data->transaction->url)  ;
    }

    public function pay_callback(){
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.tap.company/v2/charges/'.request()->tap_id , [
          'headers' => [
            'Authorization' => 'Bearer sk_live_ON351hpWE2eJ8mFwgtSH60Kz',
            'accept' => 'application/json',
          ],
        ]);
        // return json_decode($response->getBody())->response ;
        if(!$response){
            return redirect()->route('site')->with('error', 'لم تتم عملية الدفع بنجاح  ');

        }
            $data = json_decode($response->getBody()) ;
            $order_id = $data->reference->order ;
            $cost = $data->amount ;
            $order = Order::findOrFail($order_id);
            $code = $data->response->code ;
            if($code !=200){
                $order->status = 'rejected'; 
                $order->save();
                return redirect()->route('site')->with('error', 'لم تتم عملية الدفع بنجاح  ');

            }
            

            if($order->cost != $cost){
                $order->status = 'rejected'; 
                $order->save();
                return redirect()->route('user.dashboard')->with('error', 'يوجد تلاعب بعملية الدفع');

            }
            $order->status = 'approved'; 
            $order->isPaid = 1 ;
            $order->save();

            return redirect()->route('user.dashboard')->with('success', 'تمت عملية الدفع بنجاح   ');
       
        
    }
}
