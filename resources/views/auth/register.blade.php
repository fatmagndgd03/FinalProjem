@extends('layouts.app')

@section('title', 'Yeni Üyelik')

@section('content')
    <h2>Yeni Üyelik Oluştur</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Adınız:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Şifre Tekrar:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Kayıt Ol</button>

        <p style="margin-top: 20px;">
            Zaten üye misiniz? <a href="{{ route('login') }}">Giriş Yapın</a>
        </p>
    </form>
@endsection