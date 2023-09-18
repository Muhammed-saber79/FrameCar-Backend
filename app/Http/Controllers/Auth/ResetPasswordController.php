<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\Admin;
use App\Rules\EmailValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    protected $guard = 'web';
    protected $messages = [
        'email.required' => 'يرجى إدخال البريد الالكتروني...!',
        'email.email' => 'بريد إلكتروني خاطئ...!',
        'email.exists' => 'لا يوجد حساب مرتبط بهذا البريد الالكتروني...!',

        'password.required' => 'يرجى إدخال كلمة مرور جديدة',
        'password.confirmed' => 'يجب تطابق كلمتي المرورو',

        'token.required' => 'يرجى عدم اللعب ف التوكن'
    ];

    public function __construct(Request $request)
    {
        if ($request->is('admin/*'))
        {
            $this->guard = 'admin';
        }
    }

    public function create(Request $request, $token): View
    {
        $email = $request->query('email');
        $dbRow = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$dbRow || !Hash::check($token, $dbRow->token)) {
            abort(404);
        }

        /*
         * This part is implemented for get the user type from DB according to the email.
         */
        if (Admin::where('email', $email)->first()) {
            $this->guard = 'admin';
        }

        return view('site.auth.reset-password')
            ->with([
                'routePrefix' => $this->guard,
                'data' => [
                    'email' => $email,
                    'token' => $token
                ]
            ]);
    }

    public function store (Request $request): RedirectResponse
    {
        $request->validate($this->rules(), $this->messages);

        $status = Password::broker($this->guard == 'admin' ? 'admins' : 'users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make(request('password')),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()
                ->route( $this->guard == 'admin' ? 'admin.login' : 'login' )
                ->with('success', 'تم تحديث كلمة المرور بنجاح.');
        }

        throw ValidationException::withMessages([
            'error' => 'حدث خطأ ما، لا يمكن تحديث كلمة المرور الخاصة بك في الوقت الحالي...!'
        ]);
    }

    public function rules () :array
    {
        return [
            'email' => [
                'required',
                'email',
                new EmailValidation($this->guard)
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ];
    }
}
