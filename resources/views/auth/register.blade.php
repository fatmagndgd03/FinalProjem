@extends('layouts.app')

@section('title', 'Kayıt Ol')

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
            min-height: 600px;
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
                <div class="col-lg-6 col-md-8">
                    <div class="auth-card">
                        <div class="row g-0">
                            <!-- Form Area -->
                            <div class="col-12">
                                <div class="auth-form-container">
                                    <div class="text-center mb-4">
                                        <h2 class="auth-title">Kayıt Ol</h2>
                                        <p class="auth-subtitle">Yeni bir hesap oluşturun.</p>
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

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label fw-bold">Ad Soyad</label>
                                            <input type="text" class="form-control form-control-custom" id="name"
                                                name="name" value="{{ old('name') }}" required autofocus
                                                placeholder="Adınız Soyadınız">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label fw-bold">E-posta Adresi</label>
                                            <input type="email" class="form-control form-control-custom" id="email"
                                                name="email" value="{{ old('email') }}" required
                                                placeholder="isim@ornek.com">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label fw-bold">Şifre</label>
                                            <input type="password" class="form-control form-control-custom" id="password"
                                                name="password" required placeholder="••••••••">
                                        </div>

                                        <div class="mb-4">
                                            <label for="password_confirmation" class="form-label fw-bold">Şifre
                                                Tekrar</label>
                                            <input type="password" class="form-control form-control-custom"
                                                id="password_confirmation" name="password_confirmation" required
                                                placeholder="••••••••">
                                        </div>

                                        <button type="submit" class="btn btn-custom mb-4">Kayıt Ol</button>

                                        <div class="text-center">
                                            <p class="text-muted">Zaten hesabınız var mı? <a href="{{ route('login') }}"
                                                    class="auth-link">Giriş Yap</a></p>
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