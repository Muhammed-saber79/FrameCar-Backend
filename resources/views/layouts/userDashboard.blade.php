<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Frame Car | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <style>
        /*--------------------------------------------------------------
        # Whatsapp Button
        --------------------------------------------------------------*/
        /* Style for the WhatsApp button */
        .whatsapp-button {
            position: fixed;
            bottom: 15px;
            right: 15px;
            background-color: #25d366; /* Change this to your desired button color */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #fff; /* Change this to your desired icon color */
            transition: background-color 0.3s ease;
        }

        /* Style for the WhatsApp button on hover (optional) */
        .whatsapp-button:hover {
            background-color: #128c7e; /* Change this to your desired hover color */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>

    <!-- Favicons -->
    <link href="{{asset('site/assets/img/logo.png')}}" rel="icon">
    <link href="{{asset('site/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('site/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('site/assets/css/user-dash-style.css')}}" rel="stylesheet">
    <link href="{{ asset('site/assets/css/order-details-styles.css') }}" rel="stylesheet">
    <style>
        .xxGHyP-dialog-view {
            display: none !important;
        }
    </style>

    @livewireStyles
    @vite(['resources/js/app.js'])

    <!-- Google Maps -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


    <style>
        .xxGHyP-dialog-view {
            display: none !important;
        }
    </style>
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
                    @auth
                    <li class="dropdown">
                        <a style="font-size: larger; color: orange" href="#">
                            <span style="margin-left: 10px; margin-right: 10px">{{ Auth::user()->name }}</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>

                        <ul style="text-align: center">
                            <li><a class="nav-link scrollto" href="{{ route('user.dashboard') }}">لوحة التحكم</a></li>
                            <li><a onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">تسجيل الخروج</a></li>
                        </ul>
                    </li>
                    @else
                    <li><a id="loginBtn" class="getstarted scrollto" href="{{ route('login') }}">تسجيل الدخول</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>
    <!-- End Header -->

    @yield('content')

    <!-- WhatsApp Button -->
    <div class="whatsapp-button">
        <a href="https://api.whatsapp.com/send?phone=45655578788" style="text-decoration: none; color: #fff;" target="_blank">
            <i class="bi bi-whatsapp"></i>
        </a>
    </div>
    <div id="preloader"></div>
    <a href="{{ route('site') . '#' }}" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <form id="logoutForm" action="{{ route('logout') }}" method="post" style="display: none">
        @csrf
    </form>
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
    @livewireScripts

    <!-- Google Maps -->

    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })
        ({
            key: "AIzaSyCrAiq1Ox3dMymiVZSOi39P2RiTid5bs-Q",
            v: "weekly"
        });
    </script>
    <script>
        $(document).ready(function() {
            // Hide custom divs by default

            // Show/hide custom divs based on the selected value
            $("#serviceType").change(function() {
                var selectedValue = $(this).val();


                // Show the selected div
                if (selectedValue === "change") {
                    $("#glassType").show();
                    $("#glassPosition").show();
                } else {
                    $("#glassType").hide();
                    $("#glassPosition").hide();
                }
            });


            $("#servicePlace").change(function() {
                var selectedValue = $(this).val();

                // Show the selected div
                if (selectedValue === "workshop") {

                    $("#location").hide();
                } else {
                    $("#location").show();
                }
            });

            let datatimes = @json($times);
            console.log(datatimes);

            function isOptionDisabled(hour) {

                let selectedDate = $('#date').val();

                return datatimes.some(item => {
                    return item.day == selectedDate && item.time == hour;
                });
            }

            $("#date").change(function() {
                $('#timeSelect').empty();

                for (let i = 8; i <= 16; i++) {
                    let optionText = (i < 10) ? '0' + i + ':00' : i + ':00';
                    $('#timeSelect').append($('<option>', {
                        value: i,
                        text: optionText,
                        disabled: isOptionDisabled(i)
                    }));
                }

            })
        });
    </script>

</body>

</html>
