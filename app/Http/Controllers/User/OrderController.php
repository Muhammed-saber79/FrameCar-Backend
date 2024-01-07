<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function edit($id)
    {
        $times = Time::all();

        $order = Auth::user()->orders()->find($id);
        $hours = Time::where('day',$order->date)->pluck('time')->toArray();
        if (!$order) {
            return redirect()->back()->with('danger', 'هذا الطلب غير موجود...!');
        }

        return view('site.order', compact('order','times','hours'));
    }

    public function store (OrderRequest $request)
    {
   
        try {
            if ($request->hasFile('broken_glass_image')){
                $file = $request->file('broken_glass_image');

                if ($file->isValid()) {
                    $path = $file->store('orderImages', [
                        'disk' => 'public',
                    ]);

                    $request->merge([
                        'brokenGlassImage' => $path,
                    ]);
                }
            }

            $user = Auth::user();
            $request->merge([
                'locationLink' => 'https://maps.google.com/?q=' . $request->latitude . ',' . $request->longitude
            ]);
            
            $order = $user->orders()->create( $request->all() );

            $count = Order::where('date',$order->date)->where('time',$order->time)->count();
            if($count>=2){
                Time::create([
                    'day'=>$order->date , 
                    'time'=>$order->time 
                ]);
            }

         
            return redirect()->route('user.dashboard')->with('success', 'تم إرسال الطلب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());//'Error while trying to send an order...!');
        }
    }

    public function update(OrderRequest $request, $id)
    {
       
        try {
            $user = Auth::user();
            $order = $user->orders()->find($id);

            if (!$order->exists()) {
                return redirect()->back()->with('error', 'No such order existS...!');
            }

            if ($request->hasFile('broken_glass_image')) {
                $file = $request->file('broken_glass_image');

                if ($file->isValid()) {
                    $path = $file->store('orderImages', [
                        'disk' => 'public',
                    ]);

                    // Delete the old image file if needed, and update the path
                    if ($order->brokenGlassImage) {
                        Storage::disk('public')->delete($order->brokenGlassImage);
                    }

                    $request->merge([
                        'brokenGlassImage' => $path,
                    ]);
                }
            }

            $locationLink = 'https://maps.google.com/?q=' . $request->latitude . ',' . $request->longitude;
            $request->merge([
                'locationLink' => $locationLink,
            ]);
            $order->update($request->all());

            return redirect()->back()->with('success', 'تم تحديث الطلب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ اثناء عملية التحديث, حاول مجددا...!');
        }
    }

    public function destroy($id)
    {
        try {
           
            $order = Order::findOrFail($id);

            if (!$order->exists()) {
                return redirect()->back()->with('error', 'هذا الطلب غير موجود...!');
            }

            // Delete the old image file if needed, and update the path
            if ($order->brokenGlassImage) {
                Storage::disk('public')->delete($order->brokenGlassImage);
            }

            $order->delete();

            return redirect()->back()->with('success', 'تم حذف الطلب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ اثناء عملية الحذف, حاول مجددا...!');
        }
    }
}
