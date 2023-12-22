<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Frame Car | @yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset('site/assets/img/logo.png')}}" rel="icon">
        <link href="{{asset('site/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200&display=swap" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('site/assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('site/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('site/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('site/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('site/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('site/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('site/assets/css/auth-styles.css')}}" rel="stylesheet">
    </head>

    <body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center" style="display: flex; justify-content: space-between!important;">

            <div class="logo">
                <a href="{{ route('site') }}">
                    <img src="{{ asset('site/assets/img/logo.png') }}" width="80rem" alt="صورة الشعار">
                </a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="{{ route('site') . '#hero' }}">الرئيسية</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('site') . '#about' }}">من نحن</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('site') . '#services' }}">خدماتنا</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('site') . '#test' }}">لماذا تختارنا؟</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('site') . '#team' }}">مراحل الصيانة</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('site') . '#portfolio' }}">آخر أعمالنا</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('site') . '#contact' }}">اتصل بنا</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!-- End Header -->

    @yield('content')

    <div id="preloader"></div>
    @auth
        <a href="{{asset('site/')}}#" class="back-to-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>
    @endauth
    <!-- Vendor JS Files -->
    <script src="{{asset('site/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('site/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('site/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('site/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('site/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('site/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('site/assets/js/main.js')}}"></script>
    </body>

</html>
