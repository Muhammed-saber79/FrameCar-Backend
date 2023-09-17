<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Frame Car | الرئيسية</title>
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
  <link href="{{asset('site/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('site/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center" style="display: flex; justify-content: space-between!important;">

      <div class="logo">
        <a href="{{asset('site/')}}index.html">
          <img src="{{asset('site/assets/img/logo.png')}}" width="80rem" alt="صورة الشعار">
        </a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{asset('site/')}}#hero">الرئيسية</a></li>
          <li><a class="nav-link scrollto" href="{{asset('site/')}}#about">من نحن</a></li>
          <li><a class="nav-link scrollto" href="{{asset('site/')}}#services">خدماتنا</a></li>
          <li><a class="nav-link scrollto" href="{{asset('site/')}}#">لماذا تختارنا؟</a></li>
          <li><a class="nav-link scrollto" href="{{asset('site/')}}#team">مراحل الصيانة</a></li>
          <li><a class="nav-link scrollto" href="{{asset('site/')}}#portfolio">آخر أعمالنا</a></li>
          <!-- <li class="dropdown"><a href="{{asset('site/')}}#"><span>قائمة منسدلة</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{asset('site/')}}#">قائمة منسدلة 1</a></li>
              <li><a href="{{asset('site/')}}#">قائمة منسدلة 2</a></li>
              <li><a href="{{asset('site/')}}#">قائمة منسدلة 3</a></li>
              <li><a href="{{asset('site/')}}#">قائمة منسدلة 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="{{asset('site/')}}#contact">اتصل بنا</a></li>
          <li><a class="nav-link scrollto" href="{{asset('site/')}}/user-dashboard.html">لوحة التحكم</a></li>
          <li><a id="loginBtn" class="getstarted scrollto" href="{{asset('site/')}}/login.html">تسجيل الدخول</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>
  <!-- End Header -->

@yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <!-- 
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Arsha</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{asset('site/')}}#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="{{asset('site/')}}#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="{{asset('site/')}}#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="{{asset('site/')}}#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="{{asset('site/')}}#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="{{asset('site/')}}#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div> -->

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        Copyright &copy; <strong><span style="font-weight: bold; color: cyan;">Frame Car</span></strong>. All Rights
        Reserved
      </div>
      <div class="credits">
        Designed by <span style="font-weight: bold; color: cyan;">Muhammed Saber</span>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="{{asset('site/')}}#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('site/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  {{-- <script src="{{asset('site/assets/vendor/php-email-form/validate.js')}}"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{asset('site/assets/js/main.js')}}"></script>

</body>

</html>