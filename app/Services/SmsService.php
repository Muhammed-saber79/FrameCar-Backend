<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    public function sendSmsToAdmin()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer fF6p86qDeHqqdz09YDPl',
        ])->post('https://api.oursms.com/msgs/sms', [
            'src' => 'Frame car',
            'body' => 'هناك طلب جديد من احد العملاء , برجاء زيارة لوحة التحكم والرد علي العميل',
            'dests'=>['966509049316']
        ]);

        $jsonData = $response->json();
        dd($jsonData);
        return true;
    }
    public function sendSmsToUser($data)
    {
        $cost = $data['cost'];
        $message = <<<EOD
        مرحبا 
        يسعدنا استخدامك لخدمات شركة Frame Car ,
          :تكلفة الخدمة هى $cost 
       
        EOD;
        $message = '' ;
        $message =  'مرحبا \n يسعدنا استخدامك لخدمات شركتنا \n تكلفة الخدمة هى :' .  $cost ;

        if($data['message'] != null ){
            $message .=   ' \n ملاحظات : ' . $data['message'];
        }
        if($data['paymentMethod'] == 'online'){
            $message .= ' \n برجاء دفع التكلفة عن طريق الرابط  : ' .config('app.url')  .'/pay/'. $data['order_id']   ;
        }
        if($data['servicePlace'] == 'workshop'){
            $message .= '  \n الموقع : ' . 'https://www.google.com/maps?q=24.7117463,46.727938' ;
        }
        
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer fF6p86qDeHqqdz09YDPl',
        ])->post('https://api.oursms.com/msgs/sms', [
            'src' => 'Frame car',
            'body' => $message,
            'dests'=>['966509049316']
        ]);

        $jsonData = $response->json();
        dd($jsonData);
        return true;
    }
}
