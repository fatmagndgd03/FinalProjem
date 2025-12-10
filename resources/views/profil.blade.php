@extends('layouts.app')
@section('title', 'Profilim')

@section('content')
    <h2>{{ Auth::user()->name }} Hoş Geldiniz!</h2>
    <p>Bu, sadece giriş yapmış kullanıcıların görebileceği sayfadır.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Çıkış Yap</button>
    </form>
@endsection