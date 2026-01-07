@extends('layouts.app')

@section('title', 'Hakkımızda')

@section('content-wrapper-style', 'padding-top: 100px; padding-bottom: 50px;')

@section('content')
    <!-- About Us Area -->
    <section class="about-us section" style="padding-top: 10px; padding-bottom: 60px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-12 text-center">
                    <div class="about-content">
                        <h1 class="fw-bold mb-4" style="font-size: 42px; color: #000000; letter-spacing: 1px;">HAKKIMIZDA
                        </h1>
                        <h2 class="fw-bold mb-4" style="font-size: 28px; color: #333;">Solmayan Güzellik: El Yapımı Şönil
                            Çiçekler</h2>
                        <p class="text-muted mb-4" style="line-height: 1.8; font-size: 16px;">
                            Garden Flowers olarak, doğanın güzelliğini el emeğiyle buluşturuyoruz. Sıradan yapay veya taze
                            çiçeklerin aksine,
                            her bir yaprağını ve detayını özenle hazırladığımız <strong>el yapımı şönil
                                çiçeklerimizle</strong>,
                            sevdiklerinize asla solmayacak ve yıllarca saklanabilecek eşsiz bir hatıra bırakmanızı
                            sağlıyoruz.
                        </p>
                        <p class="text-muted" style="line-height: 1.8; font-size: 16px;">
                            Yumuşak dokusu, canlı renkleri ve sanatsal tasarımıyla şönil çiçeklerimiz, sadece bir hediye
                            değil, aynı zamanda dekoratif bir sanat eseridir.
                            Zamanın etkilerine meydan okuyan bu özel tasarımlar, en özel anlarınızı sonsuzlaştırır.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Area -->
    <section class="mission-vision section" style="background-color: #f9f9f9; padding: 80px 0;">
        <div class="container">
            <div class="row">
                <!-- Mission -->
                <div class="col-lg-6 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="card border-0 h-100 shadow-sm"
                        style="border-radius: 20px; transition: transform 0.3s ease;">
                        <div class="card-body p-5 text-center">
                            <div class="icon mb-4"
                                style="width: 80px; height: 80px; line-height: 80px; background: rgba(255, 107, 129, 0.1); border-radius: 50%; margin: 0 auto; color: #FF6B81; font-size: 32px;">
                                <i class="lni lni-heart"></i>
                            </div>
                            <h3 class="mb-3 fw-bold">Misyonumuz</h3>
                            <p class="text-muted" style="line-height: 1.7;">
                                Sevdiklerinize verdiğiniz değeri, zamanla kaybolmayacak el yapımı şönil çiçeklerimizle
                                simgelemek;
                                her detayıyla özenilmiş, sanatsal ve kalıcı hediyeler sunarak mutluluğunuzu daim kılmaktır.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Vision -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card border-0 h-100 shadow-sm"
                        style="border-radius: 20px; transition: transform 0.3s ease;">
                        <div class="card-body p-5 text-center">
                            <div class="icon mb-4"
                                style="width: 80px; height: 80px; line-height: 80px; background: rgba(255, 107, 129, 0.1); border-radius: 50%; margin: 0 auto; color: #FF6B81; font-size: 32px;">
                                <i class="lni lni-star"></i>
                            </div>
                            <h3 class="mb-3 fw-bold">Vizyonumuz</h3>
                            <p class="text-muted" style="line-height: 1.7;">
                                El yapımı çiçek tasarımında özgün modellerimizle fark yaratmak, "solmayan çiçek" denince
                                akla gelen
                                en güvenilir marka olmak ve el emeğinin sıcaklığını her eve taşımaktır.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection