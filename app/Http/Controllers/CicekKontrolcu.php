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
        $products = \App\Models\Cicek::where('aktif_mi', true)->with('kategori')->orderBy('created_at', 'desc')->paginate(12);
        return view('anasayfa', compact('products'));
    }

    /**
     * Ürün detay sayfasını gösterir.
     */
    public function show($slug)
    {
        $product = \App\Models\Cicek::where('slug', $slug)->where('aktif_mi', true)->firstOrFail();
        return view('urun-detay', compact('product'));
    }

    /**
     * Kategoriye göre ürünleri listeler.
     */
    public function category($slug)
    {
        $category = \App\Models\Kategori::where('slug', $slug)->firstOrFail();
        $products = \App\Models\Cicek::where('kategori_id', $category->id)
            ->where('aktif_mi', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('anasayfa', compact('products', 'category'));
    }
}
