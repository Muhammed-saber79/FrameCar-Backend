<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'يرجى إدخال البريد الالكتروني...!',
            'email.email' => 'بريد إلكتروني خاطئ...!',
            'email.unique' => 'تم استخدام هذا البريد الإلكتروني مسبقا...!',
            'password.required' => 'يرجى إدخال كلمة مرور...!',
            'password.min' => 'يرجى إدخال كلمة مرور لا تقل عن 8 احرف...!'
        ];
    }
}
