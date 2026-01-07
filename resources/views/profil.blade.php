@extends('layouts.app')

@section('title', 'Profilim')

@section('styles')
    <style>
        .profile-header {
            background: linear-gradient(135deg, #FF6B81 0%, #FF8E9D 100%);
            padding: 30px 0;
            text-align: center;
            color: white;
            margin-bottom: 30px;
            border-radius: 0 0 30px 30px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
            color: #FF6B81;
            margin: 0 auto 20px;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .nav-pills .nav-link {
            color: #555;
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
            background: #f8f9fa;
            margin-bottom: 10px;
            transition: all 0.3s;
        }

        .nav-pills .nav-link.active,
        .nav-pills .nav-link:hover {
            background-color: #FF6B81;
            color: white;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid #eee;
            padding: 20px;
            border-radius: 15px 15px 0 0 !important;
            font-weight: 700;
            font-size: 18px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #eee;
            background-color: #fcfcfc;
        }

        .form-control:focus {
            border-color: #FF6B81;
            box-shadow: 0 0 0 3px rgba(255, 107, 129, 0.1);
        }

        .btn-primary {
            background-color: #FF6B81;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #ff4c68;
        }

        .address-card {
            border: 1px solid #eee;
            padding: 20px;
            border-radius: 10px;
            position: relative;
        }

        .delete-address {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #ff4757;
            cursor: pointer;
            opacity: 0.7;
        }

        .delete-address:hover {
            opacity: 1;
        }
    </style>
@endsection

@section('header')
    @if(Auth::user()->role === 'admin')
        <!-- Admin header removed as requested -->
    @else
        @parent
    @endif
@endsection

@if(Auth::user()->role === 'admin')
@section('content-wrapper-style', 'padding-top: 0; padding-bottom: 50px; min-height: 60vh;')
@endif

@section('content')

    <!-- Profile Header -->
    <div class="profile-header" style="position: relative;">
        <!-- Back Arrow for Admin -->
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('home') }}"
                style="position: absolute; left: 40px; top: 40px; color: white; font-size: 20px; font-weight: 600; text-decoration: none; display: flex; align-items: center;">
                <i class="lni lni-arrow-left" style="margin-right: 5px; font-size: 24px;"></i> Anasayfa
            </a>
        @endif

        <div class="container">
            <div class="profile-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            @if(Auth::user()->role === 'admin')
                <div style="margin-bottom: 10px;">
                    <span
                        style="background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 20px; font-size: 14px; font-weight: 600;">Yönetici</span>
                </div>
            @endif
            <h2>{{ $user->name }}</h2>
            <p class="mb-0">{{ $user->email }}</p>
        </div>
    </div>


    <div class="container" style="padding-bottom: 80px;">
        @if(session('success'))
            <div class="alert alert-success" style="border-radius: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab">
                                <i class="lni lni-user me-2"></i> Kişisel Bilgiler
                            </button>
                            @if($user->role !== 'admin')
                                <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-address" type="button" role="tab">
                                    <i class="lni lni-map-marker me-2"></i> Adreslerim
                                </button>
                                <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-orders" type="button" role="tab">
                                    <i class="lni lni-package me-2"></i> Siparişlerim
                                </button>
                            @endif
                            @if($user->role === 'admin')
                                <a href="{{ route('admin.users.index') }}" class="nav-link text-center"
                                    style="background-color: #FF6B81; color: white;">
                                    <i class="lni lni-cog me-2"></i> Admin Paneli
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="col-lg-9">
                <div class="tab-content" id="v-pills-tabContent">

                    <!-- Personal Info Tab -->
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel">
                        <div class="card">
                            <div class="card-header">Bilgilerimi Güncelle</div>
                            <div class="card-body p-4">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Ad Soyad</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $user->name) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">E-posta</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $user->email) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Telefon Numarası</label>
                                            <input type="text" name="phone" class="form-control"
                                                value="{{ old('phone', $user->phone) }}" placeholder="0555 555 55 55">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Güncelle</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    @if($user->role !== 'admin')
                        <!-- Addresses Tab -->
                        <div class="tab-pane fade" id="v-pills-address" role="tabpanel">
                            <div class="card mb-4">
                                <div class="card-header">Yeni Adres Ekle</div>
                                <div class="card-body p-4">
                                    <form action="{{ route('profile.address.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Adres Başlığı</label>
                                                <input type="text" name="title" class="form-control" placeholder="Örn: Ev, İş">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">Şehir</label>
                                                <input type="text" name="city" class="form-control" placeholder="İstanbul">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Açık Adres</label>
                                                <textarea name="address" class="form-control" rows="2"
                                                    placeholder="Mahalle, Cadde, Sokak, No..."></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ekle</button>
                                    </form>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">Kayıtlı Adreslerim</div>
                                <div class="card-body p-4">
                                    @if($addresses->isEmpty())
                                        <p class="text-muted text-center py-3">Henüz kayıtlı adresiniz bulunmuyor.</p>
                                    @else
                                        <div class="row">
                                            @foreach($addresses as $address)
                                                <div class="col-md-6 mb-3">
                                                    <div class="address-card">
                                                        <form action="{{ route('profile.address.destroy', $address->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Silmek istediğinize emin misiniz?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link delete-address p-0 border-0"><i
                                                                    class="lni lni-trash"></i></button>
                                                        </form>
                                                        <h5 class="mb-2">{{ $address->title }}</h5>
                                                        <p class="mb-1 text-muted">{{ $address->city }}</p>
                                                        <p class="small">{{ $address->address }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Orders Tab -->
                        <div class="tab-pane fade" id="v-pills-orders" role="tabpanel">
                            <div class="card">
                                <div class="card-header">Sipariş Geçmişim</div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead style="background-color: #f8f9fa;">
                                                <tr>
                                                    <th class="p-3 border-0">Sipariş No</th>
                                                    <th class="p-3 border-0">Tarih</th>
                                                    <th class="p-3 border-0">Tutar</th>
                                                    <th class="p-3 border-0">Durum</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($orders as $order)
                                                    <tr>
                                                        <td class="p-3">#{{ $order->order_number }}</td>
                                                        <td class="p-3">{{ $order->created_at->format('d.m.Y') }}</td>
                                                        <td class="p-3">{{ number_format($order->total_price, 2) }} ₺</td>
                                                        <td class="p-3">
                                                            <span
                                                                class="badge bg-secondary rounded-pill px-3">{{ $order->status }}</span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center p-5 text-muted">
                                                            <i class="lni lni-shopping-basket mb-3 d-block"
                                                                style="font-size: 30px;"></i>
                                                            Henüz hiç sipariş vermediniz.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Tab switching fix just in case standard bootstrap doesn't catch it immediately or if using older version
        // But bootstrap.js is already included in layout, so standard data-bs-toggle="pill" should work.
    </script>
@endsection