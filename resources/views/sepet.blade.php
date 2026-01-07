@extends('layouts.app')

@section('title', 'Sepetim - Garden Flowers')

@section('content')
    <div class="breadcrumbs" style="background: #f9f9f9; padding: 20px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title" style="color: #333; font-weight: 700;">Sepetim</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav d-flex justify-content-end list-unstyled mb-0">
                        <li><a href="{{ route('home') }}" class="text-decoration-none text-muted me-2"><i
                                    class="lni lni-home"></i> Anasayfa</a></li>
                        <li class="text-muted">/ Sepetim</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section" style="padding: 50px 0; background-color: #fff;">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success shadow-sm border-0 rounded-3 mb-4">
                    <i class="lni lni-checkmark-circle me-2"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('sepet') && count(session('sepet')) > 0)
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="cart-list-head">
                            <!-- Header for Desktop -->
                            <div class="cart-list-title d-none d-lg-block bg-light p-3 rounded-3 mb-3">
                                <div class="row fw-bold text-muted">
                                    <div class="col-lg-5">Ürün Bilgisi</div>
                                    <div class="col-lg-2 text-center">Adet</div>
                                    <div class="col-lg-2 text-center">Fiyat</div>
                                    <div class="col-lg-2 text-center">Toplam</div>
                                    <div class="col-lg-1 text-center"><i class="lni lni-trash"></i></div>
                                </div>
                            </div>

                            @foreach(session('sepet') as $id => $details)
                                <div class="cart-single-list border-bottom py-3">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-6 col-12 mb-3 mb-lg-0">
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('urun.detay', Str::slug($details['ad'])) }}" class="me-3">
                                                    <img src="{{ asset($details['fotograf']) }}" alt="#" class="rounded shadow-sm"
                                                        style="width: 80px; height: 80px; object-fit: cover;">
                                                </a>
                                                <div>
                                                    <h6 class="mb-0"><a href="{{ route('urun.detay', Str::slug($details['ad'])) }}"
                                                            class="text-dark text-decoration-none fw-bold">{{ $details['ad'] }}</a>
                                                    </h6>
                                                    <small class="text-muted">Birim: {{ number_format($details['fiyat'], 2) }}
                                                        ₺</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-6 mb-3 mb-lg-0 text-center">
                                            <form action="{{ route('sepet.update') }}" method="POST" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <div class="input-group input-group-sm" style="width: 100px;">
                                                    <input type="number" name="adet"
                                                        class="form-control text-center border-secondary"
                                                        value="{{ $details['adet'] }}" min="1" onchange="this.form.submit()">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-6 mb-3 mb-lg-0 text-center d-none d-lg-block">
                                            <span class="text-muted">{{ number_format($details['fiyat'], 2) }} ₺</span>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-6 text-center">
                                            <span class="fw-bold text-primary"
                                                style="color: #FF6B81 !important;">{{ number_format($details['fiyat'] * $details['adet'], 2) }}
                                                ₺</span>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-6 text-end text-lg-center">
                                            <form action="{{ route('sepet.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <button class="btn btn-link text-danger p-0" type="submit" data-bs-toggle="tooltip"
                                                    title="Sepetten Kaldır"><i class="lni lni-close fs-5"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="col-lg-4 col-12 mt-4 mt-lg-0">
                        <div class="cart-sidebar bg-light p-4 rounded-3 shadow-sm sticky-lg-top" style="top: 100px;">
                            <h4 class="mb-3 fw-bold">Sipariş Özeti</h4>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between mb-2">
                                    <span>Ara Toplam</span>
                                    <span class="fw-bold">{{ number_format($toplamFiyat, 2) }} ₺</span>
                                </li>
                                <li class="d-flex justify-content-between mb-2">
                                    <span>Kargo</span>
                                    <span class="text-success">Ücretsiz</span>
                                </li>
                                <li class="border-top my-2 pt-2 d-flex justify-content-between align-items-center">
                                    <span class="h5 mb-0 fw-bold">Toplam</span>
                                    <span class="h4 mb-0 fw-bold" style="color: #FF6B81;">{{ number_format($toplamFiyat, 2) }}
                                        ₺</span>
                                </li>
                            </ul>
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary py-3 rounded-pill fw-bold"
                                    style="background-color: #FF6B81; border: none;">Ödemeye Geç</a>
                                <a href="{{ route('home') }}#products"
                                    class="btn btn-outline-secondary py-3 rounded-pill">Alışverişe Devam Et</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="lni lni-cart display-1 text-muted opacity-25"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Sepetiniz Boş</h3>
                    <p class="text-muted mb-4">Henüz sepetinize bir ürün eklemediniz. Harika çiçeklerimizi keşfetmeye ne
                        dersiniz?</p>
                    <a href="{{ route('home') }}#products" class="btn btn-primary px-5 py-3 rounded-pill fw-bold"
                        style="background-color: #FF6B81; border: none;">Alışverişe Başla</a>
                </div>
            @endif
        </div>
    </div>
@endsection