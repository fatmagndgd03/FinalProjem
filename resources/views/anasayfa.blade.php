<!DOCTYPE html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Çiçek Dükkanı - Appvilla Tema</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    @include('partials._header')

    <!-- Start Hero Area -->
    <section id="home" class="hero-area" style="padding: 60px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="hero-content">
                        <h1 class="wow fadeInLeft" data-wow-delay=".4s">Solmayan Şönil Çiçeklerle Kalıcı Mutluluk</h1>
                        <p class="wow fadeInLeft" data-wow-delay=".6s">El emeğiyle hazırlanan şönil buketler, tek dal
                            çiçekler ve özel hediyelerle sevdiklerinize uzun süre saklanacak anlamlı sürprizler sunun.
                        </p>
                        <div class="button wow fadeInLeft" data-wow-delay=".8s">
                            <a href="#products" class="btn">Keşfetmeye Başla</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ asset('assets/images/hero/hero-image.jpg') }}" alt="Şönil Çiçekler"
                            style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); max-height: 400px; width: auto; display: block; margin: 0 auto;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Product Area -->
    <section id="products" class="features section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3 class="wow zoomIn" data-wow-delay=".2s">Ürünlerimiz</h3>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Özenle Seçilmiş Çiçekler</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Sevdiklerinizi mutlu edecek en taze ve güzel çiçek
                            aranjmanları.</p>
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
                            <!-- Favori İkonu -->
                            <button
                                class="btn btn-sm btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-2 favorite-toggle-btn"
                                data-id="{{ $product->id }}"
                                style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; z-index: 10;">
                                @php
                                    $isFav = in_array($product->id, $userFavorites ?? []);
                                @endphp
                                <i class="{{ $isFav ? 'fas text-danger' : 'far text-secondary' }} fa-heart"
                                    id="fav-icon-{{ $product->id }}"></i>
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
                        <p>Henüz ürün eklenmemiş.</p>
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

    <!-- End Product Area -->

    @include('partials._footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/count-up.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript">
        //====== counter up 
        var cu = new counterUp({
            start: 0,
            duration: 2000,
            intvalues: true,
            interval: 100,
            append: " ",
        });
        cu.start();

        // Favorites Script
        document.addEventListener('DOMContentLoaded', function () {
            const favBtns = document.querySelectorAll('.favorite-toggle-btn');

            favBtns.forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    // Stop propagation to prevent card click opening the product
                    e.stopPropagation();

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
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</body>

</html>