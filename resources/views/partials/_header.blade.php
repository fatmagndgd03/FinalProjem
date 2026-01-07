<!-- Start Header Area -->
<!-- Start Header Area -->
<header class="header navbar-area">
    <!-- Added inline style for the requested white border -->
    <style>
        /* 1. Header Styling (Pink Background) */
        .header.navbar-area {
            background-color: #FF6B81 !important;
            position: relative !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 0px;
            z-index: 99;
        }

        /* 2. Flex Container Settings */
        .navbar {
            min-height: 80px;
            align-items: stretch !important;
            /* Allow children to manage their own alignment */
        }

        /* 3. Logo Alignment: Center */
        .navbar-brand {
            display: flex;
            align-items: center;
            /* Center content vertically */
            align-self: center !important;
            /* Center the brand element itself in the flex container */
            margin-right: 20px;
            margin-bottom: 0 !important;
            height: auto;
        }

        .navbar-brand img {
            max-height: 75px;
            width: auto;
            position: relative;
            top: 15px;
            /* Daha da aşağı kaydırıldı */
        }

        /* 4. Collapse Area */
        .navbar-collapse {
            align-items: stretch !important;
            /* Fill height */
        }

        /* 5. Main Links: Bottom Alignment */
        #nav-main-links {
            display: flex;
            /* Ensure it's flex */
            align-items: flex-end !important;
            /* Align items to bottom */
            margin-bottom: 0px !important;
            padding-bottom: 0px;
            height: 100%;
            /* Take full height */
        }

        #nav-main-links .nav-item {
            display: flex;
            align-items: flex-end;
            /* Ensure li content sits at bottom */
            height: 100%;
        }

        #nav-main-links .nav-item a {
            color: #ffffff !important;
            padding-bottom: 15px !important;
            /* Add some padding so text isn't cut off at very edge */
            display: block;
            font-size: 16px !important;
            /* Reverted to 16px */
            font-weight: 600 !important;
            text-transform: none !important;
            /* Only first letter capital (as in HTML) */
        }

        #nav-main-links .nav-item a:hover {
            color: #f0f0f0 !important;
        }

        /* 6. Auth Buttons: Center Alignment */
        .navbar-nav.ms-auto {
            align-self: center !important;
            margin-bottom: 0 !important;
            display: flex !important;
            gap: 20px !important;
            /* Normalde daha ayrık */
            align-items: center !important;
        }

        /* Remove default margins to trust gap */
        .navbar-nav.ms-auto .nav-item {
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        /* 7. Dropdown Menu Links Override (Fix visibility) */
        #nav-main-links .sub-menu {
            min-width: 160px !important;
            padding: 5px 0 !important;
        }

        #nav-main-links .sub-menu .nav-item a {
            color: #333333 !important;
            font-size: 14px !important;
            padding: 5px 12px !important;
            display: block;
        }

        #nav-main-links .sub-menu .nav-item a:hover {
            color: #FF6B81 !important;
            background-color: #f9f9f9 !important;
        }

        /* 8. Sticky Header Override */
        .header.navbar-area.sticky {
            background-color: #ffffff !important;
            padding: 10px 0 !important;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            position: fixed !important;
            top: 0;
            width: 100%;
            z-index: 999;
        }

        /* Sticky: Link Colors */
        .header.navbar-area.sticky #nav-main-links .nav-item a {
            color: #333333 !important;
        }

        .header.navbar-area.sticky #nav-main-links .nav-item a:hover {
            color: #FF6B81 !important;
        }

        /* Sticky: Logo Sizing */
        .header.navbar-area.sticky .navbar-brand img {
            max-height: 70px !important;
            width: auto !important;
            max-width: none !important;
        }

        /* Sticky: Auth Buttons Spacing */
        /* Sticky: Auth Buttons Spacing */
        /* Sticky: Auth Buttons Spacing */
        .header.navbar-area.sticky .navbar-nav.ms-auto {
            display: flex !important;
            gap: 15px !important;
            /* Biraz ferahlatıldı */
            align-items: center !important;
            margin-left: 30px !important;
            /* Sol menüden uzaklaştırıldı */
        }

        /* Base Styles for Auth Buttons (Smooth Transition) */
        .btn-auth-custom,
        .btn-alt {
            transition: all 0.4s ease !important;
            border-radius: 30px !important;
            /* Her zaman yuvarlak */
        }

        /* Sticky: Reduce Button Sizes */
        .header.navbar-area.sticky .btn-auth-custom,
        .header.navbar-area.sticky .btn-alt {
            padding: 8px 15px !important;
            font-size: 14px !important;
        }
    </style>

    <!-- Add ID to Logo for JS swapping -->
    <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <!-- Min height to ensure logo has space to center -->
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img id="header-logo" src="{{ asset('assets/images/logo/garden-flowers-ps.png') }}"
                                alt="Garden Flowers">
                        </a>

                        <!-- ... rest of navbar ... -->


                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <!-- Group 2: Main Links (Bottom Aligned) -->
                            <ul id="nav-main-links" class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="active"
                                        aria-label="Toggle navigation">Anasayfa</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('home') }}#products" aria-label="Toggle navigation">Ürünler</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">Kategoriler</a>
                                    <ul class="sub-menu collapse" id="submenu-1-4">
                                        @foreach($categories as $category)
                                            <li class="nav-item"><a
                                                    href="{{ route('kategori', $category->slug) }}">{{ $category->ad }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hakkimizda') }}" aria-label="Toggle navigation">Hakkımızda</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('iletisim') }}" aria-label="Toggle navigation">İletişim</a>
                                </li>
                                <!-- Blog tab added here as requested -->
                                <li class="nav-item">
                                    <a href="{{ route('blog') }}" aria-label="Toggle navigation">Blog</a>
                                </li>
                            </ul>

                            <!-- Group 3: Auth Buttons (Centered) -->
                            <ul class="navbar-nav ms-auto align-items-center">
                                <!-- Favorites Icon -->
                                <li class="nav-item">
                                    <a href="{{ route('favoriler') }}" id="header-fav-target" class="btn-auth-custom"
                                        style="display: flex; align-items: center; justify-content: center;">
                                        <i class="lni lni-heart"></i>
                                    </a>
                                </li>
                                <!-- Cart Icon -->
                                <li class="nav-item">
                                    <a href="{{ route('sepet.index') }}" class="btn-auth-custom"
                                        style="display: flex; align-items: center; justify-content: center;">
                                        <i class="lni lni-cart"></i>
                                        <span id="cart-count" class="ms-1 badge bg-danger rounded-pill"
                                            style="{{ session('sepet') ? '' : 'display:none;' }}">{{ session('sepet') ? count(session('sepet')) : 0 }}</span>
                                    </a>
                                </li>

                                <!-- Add margin bottom to auth buttons to align them a bit up if needed, or 0 for bottom -->
                                @auth
                                    @if(Auth::user()->role === 'admin')
                                        <li class="nav-item">
                                            <a href="{{ route('admin.users.index') }}" class="btn-auth-custom">Admin
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
                                                <i class="lni lni-enter"></i> <!-- Reverted icon -->
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

<!-- AJAX Cart Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const forms = document.querySelectorAll('form[action="{{ route("sepet.add") }}"]');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);
                const button = this.querySelector('button[type="submit"]');
                const originalText = button.innerHTML;

                // Optional: Change button state
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Ekleniyor...';

                fetch('{{ route("sepet.add") }}', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update Cart Count
                            const cartCountEl = document.getElementById('cart-count');
                            if (cartCountEl) {
                                cartCountEl.innerText = data.cartCount;
                                cartCountEl.style.display = 'inline-block';
                            }

                            // Optional: Show simple toast or alert
                            // alert(data.success); // Too intrusive? 
                            // Restoration
                            button.innerHTML = '<i class="fas fa-check"></i> Eklendi';
                            setTimeout(() => {
                                button.innerHTML = originalText;
                                button.disabled = false;
                            }, 2000);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        button.disabled = false;
                        button.innerHTML = originalText;
                    });
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        // ... (existing cart logic) ...

        // Sticky Header Logo Swap
        window.addEventListener('scroll', function () {
            var header = document.querySelector('.header');
            var logo = document.getElementById('header-logo');
            var sticky = header.offsetTop;

            if (window.pageYOffset > sticky) {
                logo.src = "{{ asset('assets/images/logo/garden-flowers-pink.png') }}";
            } else {
                logo.src = "{{ asset('assets/images/logo/garden-flowers-ps.png') }}";
            }
        });
    });
</script>