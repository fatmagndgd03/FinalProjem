<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - Garden Flowers</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}" />
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        .sidebar .nav-link {
            color: #555;
            padding: 15px 20px;
            font-weight: 600;
            border-bottom: 1px solid #eee;
            font-size: 16px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            color: #FF6B81;
            background-color: #fcfcfc;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .admin-header {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-bottom: 1px solid #ffffff !important;
            /* Requested White Frame */
        }
    </style>
</head>

<body>
    <!-- Top Navbar (Copied structure from Main Site) -->
    <!-- Header removed as requested -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar" style="top: 0;"> <!-- Adjusted top since header is separate -->
                <nav class="nav flex-column pt-4">
                    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <i class="lni lni-users"></i> Yöneticiler
                    </a>
                    <a class="nav-link" href="{{ route('profile') }}">
                        <i class="lni lni-arrow-left"></i> Profilime Dön
                    </a>
                    <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                        href="{{ route('admin.products.index') }}">
                        <i class="lni lni-flower"></i> Ürünler
                    </a>
                    <a class="nav-link" href="{{ route('home') }}" target="_blank">
                        <i class="lni lni-website"></i> Siteyi Görüntüle
                    </a>
                </nav>
            </div>

            <!-- Content -->
            <div class="col-md-9 col-lg-10 py-3">
                <!-- Removed inner admin-header since we have a top navbar now -->

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>