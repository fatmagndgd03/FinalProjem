@extends('layouts.app')

@section('title', $category->ad . ' - Appvilla')

@section('content')
    <!-- Start Product Area -->
    <section class="product-area section" style="padding-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ $category->ad }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($products as $product)
                    <div class="col-lg-3 col-md-4 col-12 mb-4">
                        <!-- Start Single Product -->
                        <div class="card h-100 shadow-sm border-0 position-relative">
                            <a href="{{ route('urun.detay', $product->slug) }}" class="text-decoration-none text-dark">
                                <!-- Ürün Görseli -->
                                @if($product->fotograf_yolu)
                                    <img src="{{ asset($product->fotograf_yolu) }}" class="card-img-top"
                                        alt="{{ $product->ad }}" style="height: 250px; object-fit: cover;">
                                @else
                                    <img src="https://via.placeholder.com/300x250?text=Çiçek" class="card-img-top"
                                        alt="{{ $product->ad }}" style="height: 250px; object-fit: cover;">
                                @endif
                            </a>

                            <!-- Favori İkonu -->
                            <button class="btn btn-sm btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-2 favorite-toggle-btn"
                                data-id="{{ $product->id }}"
                                style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; z-index: 10;">
                                @php
                                    $isFav = in_array($product->id, $userFavorites ?? []);
                                @endphp
                                <i class="{{ $isFav ? 'fas text-danger' : 'far text-secondary' }} fa-heart" id="fav-icon-{{ $product->id }}"></i>
                            </button>

                            <div class="card-body">
                                <a href="{{ route('urun.detay', $product->slug) }}" class="text-decoration-none text-dark">
                                    <h5 class="card-title">{{ $product->ad }}</h5>
                                </a>
                                <p class="card-text text-muted fw-bold">{{ number_format($product->fiyat, 2) }} ₺</p>
                            </div>
                            <div class="card-footer bg-white border-top-0 d-flex justify-content-center pb-3">
                                <form action="{{ route('sepet.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4">Sepete
                                        Ekle</button>
                                </form>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-warning">
                            Bu kategoride henüz ürün bulunmamaktadır.
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-4">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const favBtns = document.querySelectorAll('.favorite-toggle-btn');
        favBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const productId = this.getAttribute('data-id');
                const icon = document.getElementById('fav-icon-' + productId);
                
                fetch('{{ route('favori.toggle') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ id: productId })
                })
                .then(res => {
                    if(res.status === 401) { window.location.href = "{{ route('login') }}"; return; }
                    return res.json();
                })
                .then(data => {
                    if(data && data.status === 'success') {
                        if(data.action === 'added') {
                            icon.classList.remove('far', 'text-secondary');
                            icon.classList.add('fas', 'text-danger');
                            
                            // Fly Animation
                            const card = button.closest('.card');
                            const img = card.querySelector('img');
                            const target = document.getElementById('header-fav-target');
                            animateFly(img, target);
                        } else {
                            icon.classList.remove('fas', 'text-danger');
                            icon.classList.add('far', 'text-secondary');
                        }
                    }
                });
            });
        });
    });
</script>
@endsection
