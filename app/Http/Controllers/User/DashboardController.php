<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
        // $results = DB::table('orders')
        //     ->orderByRaw('
        //         CASE
        //             WHEN status = "Approved" THEN 1
        //             WHEN status = "Pending" THEN 2
        //             WHEN status = "Processing" THEN 3
        //             WHEN status = "Shipped" THEN 4
        //             WHEN status = "Delivered" THEN 5
        //             ELSE 6
        //         END,
        //         created_at DESC')->get();

        $user = User::with('orders')->find(Auth::id());
        $ordersCount = Auth::user()->orders()->count();
        $approvedOrdersCount = Auth::user()->orders()->where('status', 'approved')->count();
        $rejectedOrdersCount = Auth::user()->orders()->where('status', 'rejected')->count();

        $orders = $user->orders()->paginate(10);

        return view('site.user', compact('orders', 'ordersCount', 'approvedOrdersCount', 'rejectedOrdersCount'));
    }
}
