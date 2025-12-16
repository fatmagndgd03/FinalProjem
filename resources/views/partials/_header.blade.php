<!-- Start Header Area -->
<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Added inline style for the requested white border -->
    <style>
        /* 1. White Frame for the entire Header */
        .header.navbar-area {
            border: 3px solid #ffffff !important;
            /* Frame entire header */
            border-top: none;
            /* Optional: if top border implies separated from top of screen, but user said 'frame'. Let's keep box or just bottom? 'tüm headeri çerçevelemesini' -> all sides? Safe to do all or bottom/top/sides. Let's do all. */
        }

        /* 2. Main Links Downward Alignment */
        #nav-main-links {
            align-self: flex-end !important;
            margin-bottom: 5px;
            /* Fine tune to push text down */
        }

        /* 4. Dynamic Auth Button Styles */
        /* Default (Top of page): White Background, Pink Text */
        .btn-auth-custom {
            background-color: #ffffff !important;
            color: #FF6B81 !important;
            border: 1px solid #FF6B81 !important;
            /* Adding border to make sure it's visible if bg is white */
            padding: 8px 15px !important;
            border-radius: 30px !important;
            font-weight: bold !important;
            margin-right: 5px !important;
            /* 3. Closer spacing */
            transition: all 0.3s ease;
        }

        /* Sticky State (On Scroll): Pink Background, White Text */
        /* Assuming 'sticky' class is added to header by main.js */
        .sticky .btn-auth-custom {
            background-color: #FF6B81 !important;
            color: #ffffff !important;
            border-color: #FF6B81 !important;
        }

        /* Links in the main nav should be aligned bottom */
        .navbar-nav .nav-item .page-scroll {
            /* Existing styles might have padding, we rely on flex-end on the UL */
        }
    </style>
    <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{ route('home') }}" style="margin-right: 20px;">
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
                            <!-- Group 2: Main Links (Left Aligned next to logo, pushed down) -->
                            <ul id="nav-main-links" class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a href="#home" class="page-scroll active"
                                        aria-label="Toggle navigation">Anasayfa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#features" class="page-scroll"
                                        aria-label="Toggle navigation">Özellikler</a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" aria-label="Toggle navigation">Genel Bakış</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#pricing" class="page-scroll"
                                        aria-label="Toggle navigation">Fiyatlandırma</a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" aria-label="Toggle navigation">Ekip</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Blog</a>
                                    <ul class="sub-menu collapse" id="submenu-1-4">
                                        <li class="nav-item"><a href="javascript:void(0)">Blog Grid Sidebar</a>
                                        </li>
                                        <li class="nav-item"><a href="javascript:void(0)">Blog Single</a></li>
                                        <li class="nav-item"><a href="javascript:void(0)">Blog Single
                                                Sibebar</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0)" aria-label="Toggle navigation">İletişim</a>
                                </li>
                            </ul>

                            <!-- Group 3: Auth Buttons (Right Aligned, Closer Spacing, Custom Colors) -->
                            <ul class="navbar-nav ms-auto align-items-center">
                                @auth
                                    @if(Auth::user()->role === 'admin')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.products.index') }}" class="btn-auth-custom">Admin
                                                Paneli</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{ route('profile') }}" class="btn-auth-custom">Profilim
                                            ({{ Auth::user()->name }})</a>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn-auth-custom"
                                                style="display: flex; align-items: center; justify-content: center;">
                                                <i class="lni lni-exit"></i>
                                            </button>
                                        </form>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" style="font-weight: bold; margin-right: 15px;">Giriş
                                            Yap</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="btn btn-alt"
                                            style="color: #FF6B81; background: #fff; padding: 10px 25px; border-radius: 30px;">Kayıt
                                            Ol</a>
                                    </li>
                                @endauth
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
<!-- End Header Area -->