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
                        </div> <!-- navbar collapse -->
                        <div class="button add-list-button">
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-warning"
                                        style="margin-right: 5px; color: white;">Admin Paneli</a>
                                @endif
                                <a href="{{ route('profile') }}" class="btn">Profilim ({{ Auth::user()->name }})</a>
                                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-alt"
                                        style="margin-left:5px; border:none; color:white; background:transparent;">Çıkış</button>
                                </form>
                            @else
                                <!-- Giriş ve Kayıt Butonları -->
                                <a href="{{ route('login') }}" class="btn">Giriş Yap</a>
                                <a href="{{ route('register') }}" class="btn btn-alt" style="margin-left: 5px;">Kayıt
                                    Ol</a>
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