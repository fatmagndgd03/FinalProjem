<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CicekKontrolcu; // Henüz kullanmayacağız, ama şimdiden ekleyelim.
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- E-TİCARET ÖN YÜZ ROTASI ---
// Ana Sayfa Rotası
Route::get('/', [CicekKontrolcu::class, 'index'])->name('home');
Route::get('/urun/{slug}', [CicekKontrolcu::class, 'show'])->name('urun.detay');
Route::get('/kategori/{slug}', [CicekKontrolcu::class, 'category'])->name('kategori');
Route::view('/hakkimizda', 'hakkimizda')->name('hakkimizda');
Route::view('/iletisim', 'iletisim')->name('iletisim');

// --- SEPET ROTALARI ---
Route::get('sepet', [App\Http\Controllers\SepetController::class, 'index'])->name('sepet.index');
Route::post('sepet-ekle', [App\Http\Controllers\SepetController::class, 'add'])->name('sepet.add');
Route::post('sepet-guncelle', [App\Http\Controllers\SepetController::class, 'update'])->name('sepet.update');
Route::post('sepet-sil', [App\Http\Controllers\SepetController::class, 'remove'])->name('sepet.remove');

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

    // Profil Sayfası Rotaları
    Route::get('/profil', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profil/adres', [ProfileController::class, 'storeAddress'])->name('profile.address.store');
    Route::delete('/profil/adres/{address}', [ProfileController::class, 'destroyAddress'])->name('profile.address.destroy');

    // Admin Rotaları
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    });
});
