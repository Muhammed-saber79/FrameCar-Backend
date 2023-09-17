<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetLinkMail;
use App\Rules\EmailValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
    protected $guard = 'web';

    public function __construct(Request $request)
    {
        if ($request->is('admin/*')) {
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

        return view('site.auth.reset-password')
            ->with([
                'routePrefix' => $this->guard,
                'data' => $dbRow
            ]);
    }

    public function store (Request $request): RedirectResponse
    {
    }
}
