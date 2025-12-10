<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CicekKontrolcu; // Henüz kullanmayacağız, ama şimdiden ekleyelim.
use Illuminate\Support\Facades\Route;

// --- E-TİCARET ÖN YÜZ ROTASI ---
// Ana Sayfa Rotası
Route::get('/', [CicekKontrolcu::class, 'index'])->name('home'); 

// --- KİMLİK DOĞRULAMA (AUTH) ROTALARI ---

// Misafir (Giriş Yapmamış) Kullanıcılar İçin Grup
Route::middleware('guest')->group(function () {
    
    // Giriş (Login) Rotası
    Route::get('giris', [LoginController::class, 'create'])->name('login');
    Route::post('giris', [LoginController::class, 'store']); 

    // Kayıt (Register) Rotası
    Route::get('kayit', [RegisterController::class, 'create'])->name('register'); 
    Route::post('kayit', [RegisterController::class, 'store']); 
});

// Giriş Yapmış Kullanıcılar İçin Grup
Route::middleware('auth')->group(function () {
    
    // Çıkış (Logout) Rotası
    Route::post('cikis', [LoginController::class, 'destroy'])->name('logout');
    
    // Profil Sayfası Rotası (Test için)
    Route::get('/profil', function () {
        return view('profil'); 
    })->name('profile');
});
