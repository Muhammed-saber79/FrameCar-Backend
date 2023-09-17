<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\EmailValidation;
use App\Mail\PasswordResetLinkMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ForgotPasswordController extends Controller
{
    protected $guard = 'web';

    public function __construct(Request $request)
    {
        if ($request->is('admin/*')) {
            $this->guard = 'admin';
        }
    }

    public function create(): View
    {
        return view('site.auth.forgot-password')->with(['routePrefix' => $this->guard]);
    }

    public function store (Request $request): RedirectResponse
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                new EmailValidation($this->guard)
            ],
        ], [
            'email.required' => 'يرجى إدخال البريد الالكتروني...!',
            'email.email' => 'بريد إلكتروني خاطئ...!',
            'email.exists' => 'لا يوجد حساب مرتبط بهذا البريد الالكتروني...!',
        ]);

        /*
        $status = Password::broker($this->guard)->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
        */

        $token = Str::random(60);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->input('email')],
            [
                'token' => Hash::make($token),
                'created_at' => now(),
            ]);

        $status = Mail::to($request->email)->send(new PasswordResetLinkMail($this->guard, $token, $request->input('email')));

        return !empty($status)
            ? back()->with(['success' => 'تم إرسال رابط إلى بريدك الالكتروني بنجاح.'])
            : back()->withInput($request->only('email'))->with(['error' => 'تعذر إرسال الرابط إلى بريدك الالكتروني...!']);
    }
}
