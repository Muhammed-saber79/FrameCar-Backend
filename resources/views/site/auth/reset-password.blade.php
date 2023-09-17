@extends('layouts.auth')

@section('title')
    تغيير كلمة المرور
@endsection

@section('content')
    <div class="login-container">
        <div class="login-form">
            <h1>كلمة المرور الجديدة</h1>

            <x-flash-messages />

            <form action="{{ $routePrefix == 'admin' ? route('admin.forgot-password') : route('auth.forgot-password') }}" method="POST">
                @csrf

                <input type="hidden" name="email" value="{{ $data->email }}">
                <input type="hidden" name="token" value="{{ $data->token }}">

                <x-form.input label="كلمة المرور الجديدة" type="password" name="password" placeholder="أدخل كلمة المرور الجديدة" value=""/>
                <x-form.input label="تأكيد كلمة المرور" type="password" name="password_confirmation" placeholder="أدخل كلمة المرور مرة أخرى" value=""/>
                <button type="submit">تغيير</button>
                <hr>
                <div>
                    <a href="{{ $routePrefix == 'admin' ? route('admin.login') : route('auth.login') }}"><span>العودة لتسجيل الدخول</span></a>
                </div>
            </form>
        </div>
    </div>
@endsection
