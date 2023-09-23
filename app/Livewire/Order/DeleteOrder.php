<?php

namespace App\Livewire\Order;

use App\Models\User;
use App\Models\Order;
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
        $user = User::with('orders')->find(Auth::id());
        $order = $user->orders()->find($orderId);

        if ($order->delete()) {
            session()->flash('warning', 'تم حذف الطلب بنجاح');
            // $this->dispatch('orderDeleted');
            return redirect()->to(route('user.dashboard'));
        }
    }

    public function render()
    {
        return view('livewire.order.delete-order')->with(['order' => $this->order]);
    }
}
