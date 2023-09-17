@extends('layouts.auth')

@section('title')
    نسيت كلمة المرور
@endsection

@section('content')
    <div class="login-container">
        <div class="login-form">
            <h1>البحث عن الحساب</h1>

            <x-flash-messages />

            <form action="{{ $routePrefix == 'admin' ? route('admin.forgot-password') : route('auth.forgot-password') }}" method="POST">
                @csrf
                <x-form.input label="البريد الالكتروني" type="email" name="email" placeholder="أدخل بريدك الالكتروني للبحث عن الحساب الخاص بك" value=""/>
                <button type="submit">بحث</button>
                <hr>
                <div>
                    <a href="{{ $routePrefix == 'admin' ? route('admin.login') : route('auth.login') }}"><span>العودة لتسجيل الدخول</span></a>
                </div>
            </form>
        </div>
    </div>
@endsection
