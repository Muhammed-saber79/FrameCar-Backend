@extends('layouts.auth')

@section('title')
    إنشاء حساب
@endsection

@section('content')
    <div class="login-container">
        <div class="login-form">
            <h1>تسجيل حساب جديد</h1>

            <x-flash-messages />

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <x-form.input label="اسم المستخدم" type="text" name="name" placeholder="أدخل اسم المستخدم" value=""/>

                <x-form.input label="رقم الجوال" type="text" name="phoneNumber" placeholder="أدخل رقم الجوال" value=""/>

                <x-form.input label="البريد الالكتروني" type="email" name="email" placeholder="أدخل بريدك الالكتروني" value=""/>

                <x-form.input label="كلمة المرور" type="password" name="password" placeholder="أدخل كلمة المرور" value=""/>

                <button type="submit">إنشاء الحساب</button>
                <hr>
                <div>
                    <a href="{{ route('login') }}"><span>تسجيل الدخول</span></a>
                </div>
            </form>
        </div>
    </div>
@endsection
