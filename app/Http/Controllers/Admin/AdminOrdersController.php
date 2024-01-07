<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\EmailService;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    protected $emailService;

    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function index(){
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index',compact('orders'));
    }

    public function reply(Request $request, Order $order)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'cost' => ['required', 'numeric', 'min:0'],
            'message' => ['nullable', 'string']
        ], [
            'email.required' => 'يجب وجود البريد الالكتروني لصاحب السيارة',
            'email.email' => 'يجب ان يكون البريد الالكتروني صحيحا',
            'email.exists' => 'بريد إلكتروني خاطئ',

            'cost.required' => 'مطلوب إدخال التكلفة الكلية للصيانة',
            'cost.numeric' => 'يجب ان تكون التكلفة مكونة من ارقام فقط',
            'cost.min' => 'يجب ان لا تقل التكلفة عن صفر',

            'message.string' => 'يجب ان تكون الرسالة مكونة من نص سليم'
        ]);

        $data = [
            'email' => $request->email,
            'cost' => $request->cost,
            'message' => $request->message,
            'order_id'=>$order->id
        ];
        $order->cost = $request->cost ;
        $order->status = 'replied';
        $order->save();

        if ( $this->emailService->sendReplyEmail($data) ) {
            return redirect()->back()->with('success', 'تم إرسال الرد الى العميل بنجاح.');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ اثناء ارسال الرد الى العميل. يمكنك المحاولة مجددا.');
        }
    }

    public function updateStatus($order_id,$status){
        $order = Order::findOrFail($order_id);
        $order->status = $status ;
        $order->save();
        return redirect()->back()->with('success','تم تعديل حالة الطلب بنجاح');

    }
}
