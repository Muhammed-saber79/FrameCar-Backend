@extends('layouts.auth')

@section('title')
    تأكيد البريد الألكتروني
@endsection

@section('content')
    <div class="login-container">

        <x-toaster />
        <div class="login-form">
            <h1>تأكيد البريد الألكتروني</h1>
            <h3>تم إرسال رابط إلى بريدك الإلكتروني, برجاء اتباع الرابط المرسل اليك لتأكيد الحساب الخاص بك</h3>

            <hr>
            <div>
                <a href="{{ route('site') }}"><span>العودة للصفحة الرئيسية</span></a>
            </div>
        </div>
    </div>
@endsection
