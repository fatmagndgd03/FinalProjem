@extends('layouts.app')

@section('title', 'Favorilerim' . ' - Garden Flowers')

@section('content')
    <!-- Start Product Area -->
    <section class="product-area section" style="padding-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Favori Çiçeklerim</h2>
                        <p class="text-muted mt-2">Beğendiğiniz ürünler burada listelenir.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($favorites as $product)
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

                            <!-- Favori İkonu (Zaten favori sayfasındayız, o yüzden dolu kalp) -->
                            <button class="btn btn-sm btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-2 favorite-toggle-btn"
                                data-id="{{ $product->id }}"
                                style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-heart text-danger" id="fav-icon-{{ $product->id }}"></i>
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
                    <div class="col-12 text-center py-5">
                        <div class="alert alert-light shadow-sm d-inline-block px-5">
                            <i class="lni lni-heart text-muted display-4 mb-3"></i>
                            <h4 class="text-muted">Henüz favori ürününüz yok.</h4>
                            <a href="{{ route('home') }}#products" class="btn btn-primary rounded-pill mt-3" style="background-color: #FF6B81; border: none;">Ürünleri Keşfet</a>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center mt-4">
                    {{ $favorites->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Favori Sayfasında favoriden çıkarınca belki kartı kaldırmak istersiniz ama 
        // şimdilik sadece ikon değişsin, sayfa yenilenince gider mantığı daha sade.
        // İstenirse anlık olarak parent div remove edilebilir.
        
        const favBtns = document.querySelectorAll('.favorite-toggle-btn');
        favBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const productId = this.getAttribute('data-id');
                const icon = document.getElementById('fav-icon-' + productId);
                const cardCol = this.closest('.col-lg-3'); // Kartın içinde bulunduğu sütun

                fetch('{{ route('favori.toggle') }}', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ id: productId })
                })
                .then(res => res.json())
                .then(data => {
                    if(data && data.status === 'success') {
                        // Favoriler sayfasındaysak ve çıkartıldıysa, kartı silebiliriz.
                        if(data.action === 'removed') {
                             // Animasyonlu silme
                             cardCol.style.transition = "all 0.5s ease";
                             cardCol.style.opacity = "0";
                             cardCol.style.transform = "scale(0.8)";
                             setTimeout(() => {
                                 cardCol.remove();
                                 // Eğer hiç ürün kalmadıysa sayfayı yenilemek en kolayı boş state gelsin diye
                                 if(document.querySelectorAll('.col-lg-3').length === 0) {
                                     location.reload(); 
                                 }
                             }, 500);
                        }
                    }
                });
            });
        });
    });
</script>
@endsection
