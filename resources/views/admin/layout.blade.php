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
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar">
                <div class="p-4 text-center border-bottom">
                    <h4 class="text-primary mb-0" style="color: #FF6B81 !important;">AppAdmin</h4>
                </div>
                <nav class="nav flex-column">
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
                <div class="admin-header d-flex justify-content-between align-items-center rounded">
                    <h5 class="mb-0">Yönetim Paneli</h5>
                    <div class="d-flex align-items-center">
                        <span class="me-3">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">Çıkış</button>
                        </form>
                    </div>
                </div>

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