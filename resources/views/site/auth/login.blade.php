@extends('layouts.auth')

@section('title')
    تسجيل الدخول
@endsection

@section('content')
    <div class="login-container">
        <div class="login-form">
            <h1>تسجيل الدخول</h1>

            <x-flash-messages />

            <form action="{{ $routePrefix == 'admin' ? route('admin.login') : route('login') }}" method="POST">
                @csrf
                <x-form.input label="اسم المستخدم" type="email" name="email" placeholder="أدخل اسم المستخدم" value=""/>
                <x-form.input label="كلمة المرور" type="password" name="password" placeholder="أدخل كلمة المرور" value=""/>
                <button type="submit">تسجيل الدخول</button>
                <hr>
                <div>
                    <a href="{{ $routePrefix == 'admin' ? route('admin.password.request') : route('password.request') }}"><span>نسيت كلمة المرور؟</span></a>
                    @if($routePrefix != 'admin')
                        <a href="{{ route('register') }}"><span>انشاء حساب</span></a>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection
