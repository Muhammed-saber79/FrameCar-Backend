<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string'], //'regex:/^(?=.*[a-zA-Z]).{3,50}$/'
            //'phoneNumber' => ['required', 'regex:/^(\+\d{1,3}[- ]?)?\d{11}$/'],
            'phoneNumber' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string',Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يرجى إدخال إسم المستخدم...!',
            'name.regex' => 'يرجى إدخال إسم مستخدم لا يقل عن 3 احرف...!',
            'phone.required' => 'يرجى إدخال رقم الجوال...!',
            'phone.regex' => 'رقم الجوال خاطئ...!',
            'email.required' => 'يرجى إدخال البريد الالكتروني...!',
            'email.email' => 'بريد إلكتروني خاطئ...!',
            'email.unique' => 'تم استخدام هذا البريد الإلكتروني مسبقا...!',
            'password.required' => 'يرجى إدخال كلمة مرور...!',
            'password.min' => 'يرجى إدخال كلمة مرور لا تقل عن 8 احرف...!'
        ];
    }
}
