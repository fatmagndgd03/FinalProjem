@extends('layouts.app')

@section('title', 'Giriş Yap')

@section('styles')
    <style>
        /* Auth Page Specific Styles */
        .auth-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            background-color: #fff;
        }

        .auth-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.05);
            border: 1px solid #eee;
        }

        .auth-cover {
            background: linear-gradient(135deg, #FF6B81 0%, #FF8E9D 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px;
            color: white;
            height: 100%;
            min-height: 500px;
            /* Ensure height on desktop */
        }

        .auth-cover img {
            max-width: 80%;
            margin-bottom: 20px;
            filter: drop-shadow(0 10px 10px rgba(0, 0, 0, 0.1));
        }

        .auth-form-container {
            padding: 50px;
        }

        .auth-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .auth-subtitle {
            color: #888;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .form-control-custom {
            height: 50px;
            padding: 10px 20px;
            border-radius: 10px;
            border: 1px solid #eee;
            background-color: #f9f9f9;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-control-custom:focus {
            border-color: #FF6B81;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(255, 107, 129, 0.1);
        }

        .btn-custom {
            background-color: #FF6B81;
            color: white;
            height: 50px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            border: none;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #ff4c68;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 107, 129, 0.2);
        }

        .auth-link {
            color: #FF6B81;
            font-weight: 600;
            text-decoration: none;
        }

        .auth-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 991px) {
            .auth-cover {
                display: none;
            }
        }
    </style>
@endsection

@section('content')
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12">
                    <div class="auth-card">
                        <div class="row g-0">
                            <!-- Left Side: Image/Info -->
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="auth-cover">
                                    <div>
                                        <h2 style="color: white; font-size: 32px; margin-bottom: 20px;">Hoş Geldiniz!</h2>
                                        <p style="color: rgba(255,255,255,0.9); font-size: 16px;">Garden Flowers ile şönil çiçeklerin büyüleyici dünyasına adım atın. Hemen giriş yapın ve koleksiyonumuzu keşfedin.</p>
                                        <img src="{{ asset('assets/images/hero/phone.png') }}" alt="App Preview"
                                            style="max-width: 200px; margin-top: 30px;">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side: Form -->
                            <div class="col-lg-6">
                                <div class="auth-form-container">
                                    <div class="text-center mb-4">
                                        <h2 class="auth-title">Tekrar Giriş Yap</h2>
                                        <p class="auth-subtitle">Hesabınıza erişmek için bilgilerinizi girin.</p>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger" style="border-radius: 10px; font-size: 14px;">
                                            <ul class="mb-0 ps-3">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label fw-bold">E-posta Adresi</label>
                                            <input type="email" class="form-control form-control-custom" id="email"
                                                name="email" value="{{ old('email') }}" required autofocus
                                                placeholder="isim@ornek.com">
                                        </div>

                                        <div class="mb-4">
                                            <label for="password" class="form-label fw-bold">Şifre</label>
                                            <input type="password" class="form-control form-control-custom" id="password"
                                                name="password" required placeholder="••••••••">
                                        </div>

                                        <button type="submit" class="btn btn-custom mb-4">Giriş Yap</button>

                                        <div class="text-center">
                                            <p class="text-muted">Hesabınız yok mu? <a href="{{ route('register') }}"
                                                    class="auth-link">Kayıt Ol</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection