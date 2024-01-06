<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('site.auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->only('name', 'phoneNumber', 'email', 'password'));
        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', 'برجاء فحص بريدك الإلكتروني واتباع الرابط المرسل لتفعيل الحساب الخاص بك');
    }
}
