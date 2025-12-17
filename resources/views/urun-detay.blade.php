@extends('admin.layout') {{-- Layout'ı admin değil genel layout yapmamız lazım aslında ama şimdilik admin layout
kullanılmış, header/footer partials ile düzeltilebilir --}}
{{-- Doğru layout: layouts.app veya benzeri olmalı. Anasayfa'da ne kullanılmış bakalım. --}}
{{-- Anasayfa'da @include('partials._header') ve @include('partials._footer') var, layout extend etmemiş. Biz de öyle
yapalım. --}}

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->ad }} - Çiçek Sepeti Klonu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm border-0 p-4">
                    <div class="row">
                        <!-- Sol Taraf: Ürün Görseli -->
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="position-relative">
                                @if($product->fotograf_yolu)
                                    <img src="{{ asset($product->fotograf_yolu) }}"
                                        class="img-fluid rounded shadow-sm w-100" alt="{{ $product->ad }}"
                                        style="object-fit: cover; max-height: 500px;">
                                @else
                                    <img src="https://via.placeholder.com/500x500?text=Çiçek"
                                        class="img-fluid rounded shadow-sm w-100" alt="{{ $product->ad }}">
                                @endif

                                <!-- Favori Butonu (Resim Üzerinde) -->
                                <button
                                    class="btn btn-light rounded-circle shadow position-absolute top-0 end-0 m-3 p-2"
                                    style="width: 45px; height: 45px;">
                                    <i class="far fa-heart text-danger fs-4"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Sağ Taraf: Ürün Bilgileri -->
                        <div class="col-md-6 d-flex flex-column justify-content-center">
                            <h1 class="fw-bold mb-2">{{ $product->ad }}</h1>

                            <!-- Kategori -->
                            <div class="mb-3">
                                <span
                                    class="badge bg-light text-secondary border">{{ $product->kategori->ad ?? 'Genel' }}</span>
                                @if($product->stok < 10 && $product->stok > 0)
                                    <span class="badge bg-warning text-dark ms-2"><i
                                            class="fas fa-exclamation-triangle me-1"></i>Tükeniyor!</span>
                                @elseif($product->stok == 0)
                                    <span class="badge bg-secondary ms-2">Stok Tükendi</span>
                                @endif
                            </div>

                            <!-- Fiyat -->
                            <div class="mb-4">
                                <h2 class="text-danger fw-bold">{{ number_format($product->fiyat, 2) }} ₺</h2>
                            </div>

                            <!-- Açıklama -->
                            <div class="mb-4">
                                <h5 class="fw-bold fs-6 text-muted">Ürün Açıklaması</h5>
                                <p class="text-secondary" style="line-height: 1.6;">
                                    {{ $product->aciklama }}
                                </p>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-auto">
                                <form action="{{ route('sepet.add') }}" method="POST" class="flex-grow-1">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-danger btn-lg px-5 rounded-pill w-100" {{ $product->stok == 0 ? 'disabled' : '' }}>
                                        <i class="fas fa-shopping-cart me-2"></i> Sepete Ekle
                                    </button>
                                </form>
                            </div>

                            <!-- Stok Bilgisi (İsteğe bağlı, kullanıcı istemediyse göstermeyebiliriz ama "Tükeniyor" mantığı için backend tarafında kontrol var, burada da sadece badge gösteriyoruz) -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials._footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>