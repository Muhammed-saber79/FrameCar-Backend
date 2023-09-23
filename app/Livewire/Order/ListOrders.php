<?php

namespace App\Livewire\Order;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ListOrders extends Component
{
    use WithPagination;

    // protected $listeners = ['orderDeleted' => 'refreshListOrders'];
    #[On('orderDeleted')]
    public function refreshListOrders()
    {
        $this->dispatch('refreshListOrders');
    }

    public function render()
    {
        $user = User::with('orders')->find(Auth::id());
        $orders = $user->orders()->paginate(10);
        
        return view('livewire.order.list-orders')->with(['orders' => $orders]);
    }
}
