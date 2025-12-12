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

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('home') }}">
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
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" aria-label="Toggle navigation">Anasayfa</a>
                                    </li>
                                    @auth
                                        <li class="nav-item">
                                            <a href="{{ route('profile') }}">Profilim</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}">Giriş</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}">Kayıt Ol</a>
                                        </li>
                                    @endauth
                                </ul>
                            </div> <!-- navbar collapse -->
                            <div class="button add-list-button">
                                @auth
                                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn">Çıkış Yap</button>
                                    </form>
                                @else
                                    <a href="{{ route('register') }}" class="btn">Hemen Başla</a>
                                @endauth
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

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