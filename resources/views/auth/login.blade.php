@extends('layouts.app')

@section('title', 'Giriş Yap')

@section('content')
    <h2>Giriş Yapın</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit">Giriş Yap</button>

        <p style="margin-top: 20px;">
            Üye değil misiniz? <a href="{{ route('register') }}">Hemen Kayıt Olun</a>
        </p>
    </form>
@endsection