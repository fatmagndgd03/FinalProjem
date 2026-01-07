@extends('layouts.app')

@section('title', $product->ad)

@section('content-wrapper-style', 'padding-top: 120px; padding-bottom: 80px;')

@section('content')
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <!-- Ürün Görseli -->
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images"
                            style="border-radius: 20px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                            <main id="gallery">
                                <div class="main-img">
                                    @if($product->fotograf_yolu)
                                        <img src="{{ asset($product->fotograf_yolu) }}" id="current" alt="{{ $product->ad }}"
                                            style="width: 100%; height: auto; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/600x600?text=Görsel+Yok" id="current"
                                            alt="{{ $product->ad }}" style="width: 100%;">
                                    @endif
                                </div>
                            </main>
                        </div>
                    </div>

                    <!-- Ürün Bilgileri -->
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info px-lg-5 mt-5 mt-lg-0">
                            <!-- Kategori Badge -->
                            <span class="badge rounded-pill bg-light text-primary mb-3 px-3 py-2 text-uppercase"
                                style="letter-spacing: 1px; font-weight: 600;">
                                {{ $product->kategori->ad ?? 'Genel' }}
                            </span>

                            <h2 class="title fw-bold mb-3" style="font-size: 32px; color: #333;">{{ $product->ad }}</h2>

                            <!-- Fiyat -->
                            <h3 class="price fw-bold text-primary mb-4" style="font-size: 28px; color: #FF6B81 !important;">
                                {{ number_format($product->fiyat, 2) }} ₺
                            </h3>

                            <!-- Açıklama -->
                            <p class="info-text text-muted mb-5" style="line-height: 1.8; font-size: 16px;">
                                {{ $product->aciklama }}
                            </p>

                            <!-- Butonlar -->
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <div class="button cart-button">
                                            <form action="{{ route('sepet.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button class="btn btn-primary w-100 py-3 rounded-pill"
                                                    style="background-color: #FF6B81; border: none; font-size: 16px; font-weight: 600;">
                                                    <i class="lni lni-cart me-2"></i> Sepete Ekle
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="wish-button">
                                            <button
                                                class="btn btn-outline-secondary w-100 py-3 rounded-pill favorite-toggle-btn"
                                                data-id="{{ $product->id }}"
                                                style="border-color: #ddd; color: #666; font-size: 16px;">
                                                <i class="{{ $isFavorite ? 'fas text-danger' : 'far' }} fa-heart me-2"
                                                    id="fav-icon-{{ $product->id }}"></i> Favorile
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ek Bilgiler -->
                            <div class="product-meta mt-5 pt-4 border-top">
                                <ul class="list-unstyled text-muted small">
                                    <li class="mb-2"><i class="lni lni-checkmark-circle me-2 text-success"></i> Stok Durumu:
                                        {{ $product->stok > 0 ? 'Stokta Var' : 'Tükendi' }}
                                    </li>
                                    <li class="mb-2"><i class="lni lni-delivery me-2 text-primary"></i> Hızlı Teslimat</li>
                                    <li><i class="lni lni-protection me-2 text-warning"></i> Güvenli Ödeme</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const favBtns = document.querySelectorAll('.favorite-toggle-btn');

            favBtns.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const productId = this.getAttribute('data-id');
                    const icon = document.getElementById('fav-icon-' + productId);
                    const button = this;

                    fetch('{{ route('favori.toggle') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id: productId })
                    })
                        .then(response => {
                            if (response.status === 401) {
                                window.location.href = "{{ route('login') }}";
                                return;
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data && data.status === 'success') {
                                if (data.action === 'added') {
                                    icon.classList.remove('far');
                                    icon.classList.add('fas', 'text-danger');

                                    // Fly Animation
                                    const img = document.getElementById('current');
                                    const target = document.getElementById('header-fav-target');
                                    animateFly(img, target);
                                } else {
                                    icon.classList.remove('fas', 'text-danger');
                                    icon.classList.add('far');
                                }
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
@endsection