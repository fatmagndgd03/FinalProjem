@extends('admin.layout')

@section('title', 'Sepetim')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Sepetim</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Anasayfa</a></li>
                        <li>Sepetim</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('sepet') && count(session('sepet')) > 0)
                <div class="cart-list-head">
                    <!-- Cart List Title -->
                    <div class="cart-list-title">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-12">
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <p>Ürün Adı</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Adet</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Birim Fiyat</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Ara Toplam</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <p>Sil</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Cart List Title -->

                    @foreach(session('sepet') as $id => $details)
                        <div class="cart-single-list">
                            <div class="row align-items-center">
                                <div class="col-lg-1 col-md-1 col-12">
                                    <a href="{{ route('urun.detay', Str::slug($details['ad'])) }}">
                                        <img src="{{ asset($details['fotograf']) }}" alt="#">
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-3 col-12">
                                    <h5 class="product-name"><a
                                            href="{{ route('urun.detay', Str::slug($details['ad'])) }}">{{ $details['ad'] }}</a>
                                    </h5>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <div class="count-input">
                                        <!-- Basit form ile güncelleme veya ileride AJAX -->
                                        <form action="{{ route('sepet.update') }}" method="POST" class="d-flex">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <input type="number" name="adet" class="form-control" value="{{ $details['adet'] }}"
                                                min="1" onchange="this.form.submit()">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>{{ number_format($details['fiyat'], 2) }} ₺</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>{{ number_format($details['fiyat'] * $details['adet'], 2) }} ₺</p>
                                </div>
                                <div class="col-lg-1 col-md-2 col-12">
                                    <form action="{{ route('sepet.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <button class="remove-item" type="submit"><i class="lni lni-close"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-12">
                                    <div class="left">
                                        <!-- Kupon vs buraya gelebilir -->
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>Toplam Sepet Tutarı<span>{{ number_format($toplamFiyat, 2) }} ₺</span></li>
                                            <!-- Kargo vs eklenebilir -->
                                            <li class="last">Ödenecek Tutar<span>{{ number_format($toplamFiyat, 2) }} ₺</span>
                                            </li>
                                        </ul>
                                        <div class="button">
                                            <a href="#" class="btn">Satın Al (Ödeme)</a>
                                            <a href="{{ route('home') }}" class="btn btn-alt">Alışverişe Devam Et</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <h3>Sepetiniz boş.</h3>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Alışverişe Başla</a>
                </div>
            @endif
        </div>
    </div>
@endsection