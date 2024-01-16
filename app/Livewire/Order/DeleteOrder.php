<?php

namespace App\Livewire\Order;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DeleteOrder extends Component
{
    public Order $order;

    public function showModal()
    {
    }

    public function delete($orderId)
    {
        try {
            DB::beginTransaction();

            $order = Order::findOrFail($orderId);

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
                session()->flash('warning', ' حذف الطلب بنجاح');

                return redirect()->to(route('user.dashboard'));
            }
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'الطلب غير موجود');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ أثناء عملية الحذف, حاول مجددا...!');
        }
    }

    public function render()
    {
        return view('livewire.order.delete-order')->with(['order' => $this->order]);
    }
}
