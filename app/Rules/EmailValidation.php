<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class EmailValidation implements ValidationRule
{
    protected $guard;
    public function __construct($guard)
    {
        $this->guard = $guard;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $emailCheck = DB::table($this->guard == 'admin' ? 'admins' : 'users')->where('email', $value);

        if (!$emailCheck->exists()) {
            $fail('لا يوجد حساب مسجل لدينا مرتبط بهذا البريد الإلكتروني');
        }
    }
}
