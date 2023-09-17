<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    protected $guard = 'web';

    public function __construct(Request $request)
    {
        if ($request->is('admin/*'))
        {
            $this->guard = 'admin';
        }
    }

    public function create(): View
    {
        return view('site.auth.login')
            ->with([
                'routePrefix' => $this->guard,
            ]);
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        if(! Auth::guard($this->guard)->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'نأسف, هذه البيانات لا تطابق البيانات المسجلة لدينا...!'
            ]);
        }

        $request->session()->regenerate();
        return redirect()->intended();
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard($this->guard)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('site');
    }
}
