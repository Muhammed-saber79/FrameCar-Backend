<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = User::with('orders')->find(Auth::id());
        $orders = $user->orders()->paginate(10);

        return view('site.user', compact('orders'));
    }
}
