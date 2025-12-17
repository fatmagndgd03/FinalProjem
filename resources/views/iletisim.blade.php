@extends('admin.layout')

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim - Çiçek Dükkanı</title>
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
        <h1 class="fw-bold mb-4 text-center">İletişim</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 p-4">
                    <p class="lead text-center mb-4">Bizimle iletişime geçmek için aşağıdaki formu kullanabilirsiniz.
                    </p>
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Adınız Soyadınız</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-posta Adresiniz</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mesajınız</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #FF6B81; border: none;">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('partials._footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>