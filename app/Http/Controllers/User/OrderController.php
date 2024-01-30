<?php

namespace App\Http\Controllers\User;

use App\Models\Time;
use App\Models\User;
use App\Models\Order;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderController extends Controller
{

    public function edit($id)
    {
        $times = Time::all();

        $order = Auth::user()->orders()->find($id);
        $hours = Time::where('day', $order->date)->pluck('time')->toArray();
        if (!$order) {
            return redirect()->back()->with('danger', 'هذا الطلب غير موجود...!');
        }

        return view('site.order', compact('order', 'times', 'hours'));
    }

    public function store(OrderRequest $request)
    {
        // $receiverNumber = "+966509049316";
        // $message = "This is testing from ItSolutionStuff.com";
  
        // try {
  
        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");
  
        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($receiverNumber, [
        //         'from' => $twilio_number, 
        //         'body' => $message]);
  
        //     dd('SMS Sent Successfully.');
  
        // } catch (\Exception $e) {
        //     dd("Error: ". $e->getMessage());
        // }
        try {
           






            $car_front_image_path = $this->storeImage('car_front_image_1', $request, 'public');
            $car_back_image_path = $this->storeImage('car_back_image_1', $request, 'public');
            $camera_image_path = $this->storeImage('camera_image_1', $request, 'public');

            $user = Auth::user();
            $request->merge([
                'locationLink' => 'https://maps.google.com/?q=' . $request->latitude . ',' . $request->longitude,
                'car_front_image' => $car_front_image_path,
                'car_back_image' => $car_back_image_path,
                'camera_image' => $camera_image_path,
            ]);

            $order = $user->orders()->create($request->all());

            $count = Order::where('date', $order->date)->where('time', $order->time)->count();
            if ($count >= 2) {
                Time::create([
                    'day' => $order->date,
                    'time' => $order->time
                ]);
            }


            return redirect()->route('user.dashboard')->with('success', 'تم إرسال الطلب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage()); //'Error while trying to send an order...!');
        }
    }

    public function update(OrderRequest $request, $id)
    {
        try {
            $user = Auth::user();
            $order = $user->orders()->find($id);

            if (!$order->exists()) {
                return redirect()->back()->with('error', 'هذا الطلب غير موجود...!');
            }

            $car_front_image_path = $this->updateImage('car_front_image_1', $request, 'public', $order->car_front_image) ?? $order->car_front_image;
            $car_back_image_path = $this->updateImage('car_back_image_1', $request, 'public', $order->car_back_image) ?? $order->car_back_image;
            $camera_image_path = $this->updateImage('camera_image_1', $request, 'public', $order->camera_image) ?? $order->camera_image;

            $locationLink = 'https://maps.google.com/?q=' . $request->latitude . ',' . $request->longitude;
            $request->merge([
                'locationLink' => $locationLink,
                'car_front_image' => $car_front_image_path,
                'car_back_image' => $car_back_image_path,
                'camera_image' => $camera_image_path,
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
            DB::beginTransaction();

            $order = Order::findOrFail($id);

            if ($order->car_front_image) {
                Storage::disk('public')->delete($order->car_front_image);
            }
            if ($order->car_back_image) {
                Storage::disk('public')->delete($order->car_back_image);
            }
            if ($order->camera_image) {
                Storage::disk('public')->delete($order->camera_image);
            }

            if ($order->delete()) {
                DB::commit();
                return redirect()->back()->with('success', 'تم حذف الطلب بنجاح');
            }
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'الطلب غير موجود');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ اثناء عملية الحذف, حاول مجددا...!');
        }
    }

    private function storeImage($imageKey, $request, $disk = 'public')
    {
        $path = null;
        if ($request->hasFile($imageKey)) {
            $image = $request->file($imageKey);
            if ($image->isValid()) {
                $path = $image->store('orderImages', [
                    'disk' => $disk,
                ]);
            }
        }

        return $path;
    }
    private function updateImage($imageKey, $request, $disk = 'public', $old_image_path)
    {
        $path = null;
        if ($request->hasFile($imageKey)) {
            $image = $request->file($imageKey);
            if ($image->isValid()) {
                $path = $image->store('orderImages', [
                    'disk' => $disk,
                ]);

                if ($old_image_path) {
                    Storage::disk('public')->delete($old_image_path);
                }
            }
        }
        return $path;
    }
}
