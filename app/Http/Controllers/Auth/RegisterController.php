<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
        $user = User::create($request->all());
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
