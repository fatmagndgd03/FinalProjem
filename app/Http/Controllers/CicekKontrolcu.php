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
        $products = \App\Models\Cicek::where('aktif_mi', true)->with('kategori')->orderBy('created_at', 'desc')->take(8)->get();
        return view('anasayfa', compact('products'));
    }
}
