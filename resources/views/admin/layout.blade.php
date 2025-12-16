<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - Appvilla</title>
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
    <header class="header navbar-area" style="background: #fff; border-bottom: 2px solid #eee; padding: 0;">
        <div class="container-fluid" style="padding-left: 30px; padding-right: 30px;">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <!-- Group 1: Logo -->
                            <a class="navbar-brand" href="{{ route('home') }}" style="margin-right: 30px;">
                                <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo" style="height: 40px;">
                                <!-- Using colored logo since bg is white -->
                            </a>

                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <!-- Group 2: Main Links - REMOVED AS REQUESTED -->


                                <!-- Group 3: Auth Buttons (Right Aligned) - REMOVED AS REQUESTED -->
                                <!-- User requested to remove Admin Panel, Manager, and Exit tabs -->
                            </div>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar" style="top: 0;"> <!-- Adjusted top since header is separate -->
                <nav class="nav flex-column pt-4">
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