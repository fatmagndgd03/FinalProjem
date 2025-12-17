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
                        <p class="wow fadeInLeft" data-wow-delay=".6s">El emeğiyle hazırlanan şönil buketler, tek dal çiçekler ve özel hediyelerle sevdiklerinize uzun süre saklanacak anlamlı sürprizler sunun.</p>
                        <div class="button wow fadeInLeft" data-wow-delay=".8s">
                            <a href="#products" class="btn">Keşfetmeye Başla</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ asset('assets/images/hero/hero-image.jpg') }}" alt="Şönil Çiçekler" style="border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); max-height: 400px; width: auto; display: block; margin: 0 auto;">
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
                        <p class="wow fadeInUp" data-wow-delay=".6s">Sevdiklerinizi mutlu edecek en taze ve güzel çiçek aranjmanları.</p>
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
                                <img src="{{ asset($product->fotograf_yolu) }}" class="card-img-top" alt="{{ $product->ad }}" style="height: 250px; object-fit: cover;">
                            @else
                                <img src="https://via.placeholder.com/300x250?text=Çiçek" class="card-img-top" alt="{{ $product->ad }}" style="height: 250px; object-fit: cover;">
                            @endif
                        </a>
        
                        <!-- Favori İkonu -->
                        <button class="btn btn-sm btn-light rounded-circle shadow-sm position-absolute top-0 end-0 m-2" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-heart text-secondary"></i>
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
                                <button type="submit" class="btn btn-outline-danger rounded-pill px-4">Sepete Ekle</button>
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

    <!-- Start Achievement Area -->
    <section class="our-achievement section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="title">
                        <h2>80'den fazla gezegenden geliştiriciler tarafından güveniliyor</h2>
                        <p>Lorem Ipsum pasajlarının birçok varyasyonu vardır.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".2s">
                                <h3 class="counter"><span id="secondo1" class="countup" cup-end="100">100</span>%</h3>
                                <p>Memnuniyet</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".4s">
                                <h3 class="counter"><span id="secondo2" class="countup" cup-end="120">120</span>K</h3>
                                <p>Mutlu Kullanıcı</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="single-achievement wow fadeInUp" data-wow-delay=".6s">
                                <h3 class="counter"><span id="secondo3" class="countup" cup-end="125">125</span>k+</h3>
                                <p>İndirme</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achievement Area -->

    <!-- Start Pricing Table Area -->
    <section id="pricing" class="pricing-table section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3 class="wow zoomIn" data-wow-delay=".2s">Fiyatlandırma</h3>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Fiyatlandırma Planı</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">Hobby</h4>
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">$12<span class="duration">/mo</span></h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Buy Hobby</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">What's Included</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Cras justo odio.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Dapibus ac facilisis in.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Morbi leo risus.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Potenti felis, in cras ligula.</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".4s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">Freelancer</h4>
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">$24<span class="duration">/mo</span></h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Buy Freelancer</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">What's Included</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Cras justo odio.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Dapibus ac facilisis in.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Morbi leo risus.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Potenti felis, in cras ligula.</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".6s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">Startup</h4>
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">$32<span class="duration">/mo</span></h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Buy Startup</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">What's Included</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Cras justo odio.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Dapibus ac facilisis in.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Morbi leo risus.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Potenti felis, in cras ligula.</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".8s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <h4 class="title">Enterprise</h4>
                            <p>All the basics for starting a new business</p>
                            <div class="price">
                                <h2 class="amount">$48<span class="duration">/mo</span></h2>
                            </div>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Buy Enterprise</a>
                            </div>
                        </div>
                        <!-- End Table Head -->
                        <!-- Start Table Content -->
                        <div class="table-content">
                            <h4 class="middle-title">What's Included</h4>
                            <!-- Table List -->
                            <ul class="table-list">
                                <li><i class="lni lni-checkmark-circle"></i> Cras justo odio.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Dapibus ac facilisis in.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Morbi leo risus.</li>
                                <li><i class="lni lni-checkmark-circle"></i> Potenti felis, in cras ligula.</li>
                            </ul>
                            <!-- End Table List -->
                        </div>
                        <!-- End Table Content -->
                    </div>
                    <!-- End Single Table-->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Pricing Table Area -->

    <!-- Start Call To Action Area -->
    <section class="section call-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="cta-content">
                        <h2 class="wow fadeInUp" data-wow-delay=".2s">Appvilla'nın ücretsiz Lite <br>Sürümünü
                            kullanıyorsunuz
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Bütün özellikler için lütfen tam sürümü satın alın.
                        </p>
                        <div class="button wow fadeInUp" data-wow-delay=".6s">
                            <a href="javascript:void(0)" class="btn">Satın Al</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action Area -->

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
    </script>
</body>

</html>