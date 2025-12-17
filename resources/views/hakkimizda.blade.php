@extends('admin.layout') {{-- Layout yine geçici olarak admin layout --}}

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda - Çiçek Dükkanı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    @include('partials._header')

    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold mb-4">Hakkımızda</h1>
                <p class="lead text-muted">
                    Çiçek Dükkanı olarak, en taze ve en güzel çiçekleri sevdiklerinizle buluşturmak için buradayız.
                    Yılların verdiği tecrübe ile özel günlerinizde yanınızdayız.
                </p>
                <p>
                    Müşteri memnuniyeti odaklı çalışıyor, siparişlerinizi özenle hazırlayıp zamanında teslim ediyoruz.
                    Geniş ürün yelpazemiz ile her zevke hitap eden aranjmanlar sunuyoruz.
                </p>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/600x400?text=Hakkımızda" class="img-fluid rounded shadow"
                    alt="Hakkımızda">
            </div>
        </div>
    </div>

    @include('partials._footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>