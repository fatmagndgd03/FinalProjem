<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CicekKontrolcu extends Controller
{
    /**
     * Ana Sayfayı ve Çiçek Listesini gösterir.
     */
    public function index()
    {
        // Şimdilik sadece ana şablonumuzu çağırıp içeriği boş bırakıyoruz.
        // Ana sayfamız için bir "anasayfa.blade.php" dosyası oluşturmamız gerekiyor.
        return view('anasayfa'); 
    }
}
