@extends('layouts.app')

@section('title', 'Çiçek Dükkanı')

@section('content')
    <header style="text-align: center; border-bottom: 1px solid #ccc; padding-bottom: 20px;">
        <h1>Çiçek Dükkanına Hoş Geldiniz! 🌹</h1>
        <p>Giriş yaparak alışverişe başlayın veya hemen <a href="{{ route('register') }}">kayıt olun</a>.</p>
        
        @auth 
            <p>Merhaba {{ Auth::user()->name }}! <a href="{{ route('profile') }}">Profilim</a></p>
        @else
            <p><a href="{{ route('login') }}">Giriş Yap</a></p>
        @endauth
    </header>

    <div style="margin-top: 30px;">
        <h3>Ana Sayfa İçeriği Burada Listelenecek (Şimdilik Boş)</h3>
        </div>
@endsection