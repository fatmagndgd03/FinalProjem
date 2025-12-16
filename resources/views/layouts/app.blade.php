<!DOCTYPE html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'Çiçek Dükkanı') - Appvilla</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

    @yield('styles')
    <style>
        .header.navbar-area {
            border-bottom: 4px solid #ffffff !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        Kullandığınız tarayıcı <strong>çok eski</strong>. Lütfen deneyiminizi ve güvenliğinizi artırmak için
        <a href="https://browsehappy.com/">tarayıcınızı güncelleyin</a>.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    @section('header')
    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;"> <!-- Increased width -->
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('home') }}" style="margin-right: 30px;">
                                <img src="{{ asset('assets/images/logo/white-logo.svg') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <!-- LEFT GROUP: Main Navigation (Logo's neighbor) -->
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" aria-label="Toggle navigation">Anasayfa</a>
                                    </li>
                                    <!-- Other main info links can go here (e.g., Features, Pricing) -->
                                </ul>

                                <!-- RIGHT GROUP: Auth Buttons (Far Right) -->
                                <ul class="navbar-nav ms-auto">
                                    @auth
                                        @if (auth()->user()->role === 'admin')
                                            <li class="nav-item">
                                                <a href="{{ route('admin.products.index') }}">Admin Paneli</a>
                                            </li>
                                        @endif
                                        <li class="nav-item">
                                            <a href="{{ route('profile') }}">Profilim</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:void(0)"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="lni lni-exit"></i> Çıkış Yap
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @endauth

                                    @guest
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}">Giriş</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}">Kayıt Ol</a>
                                        </li>
                                    @endguest
                                </ul>
                            </div> <!-- navbar collapse -->
                            <!-- Removed standalone button container to force everything into the navbar alignment -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->
    @show


    <!-- Content Wrapper -->
    <div style="padding-top: 150px; padding-bottom: 50px; min-height: 60vh;">
        @yield('content')
    </div>
    <!-- End Content Wrapper -->

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-about">
                            <div class="logo">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/logo/white-logo.svg') }}" alt="#">
                                </a>
                            </div>
                            <p>Zarif hiyerarşiler inşa ederek dünyayı daha iyi bir yer haline getiriyoruz.</p>
                            <ul class="social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <!-- Footer Linkleri Kısaltıldı -->
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')
</body>

</html>