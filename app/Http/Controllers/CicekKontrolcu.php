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

        $userFavorites = [];
        if (\Illuminate\Support\Facades\Auth::check()) {
            $userFavorites = \Illuminate\Support\Facades\Auth::user()->favorites()->pluck('cicekler.id')->toArray();
        }

        return view('anasayfa', compact('products', 'userFavorites'));
    }

    /**
     * Ürün detay sayfasını gösterir.
     */
    public function show($slug)
    {
        $product = \App\Models\Cicek::where('slug', $slug)->where('aktif_mi', true)->firstOrFail();

        $isFavorite = false;
        if (\Illuminate\Support\Facades\Auth::check()) {
            $isFavorite = \Illuminate\Support\Facades\Auth::user()->favorites()->where('cicekler.id', $product->id)->exists();
        }

        return view('urun-detay', compact('product', 'isFavorite'));
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

        $userFavorites = [];
        if (\Illuminate\Support\Facades\Auth::check()) {
            $userFavorites = \Illuminate\Support\Facades\Auth::user()->favorites()->pluck('cicekler.id')->toArray();
        }

        return view('kategori', compact('products', 'category', 'userFavorites'));
    }
}
