<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cicek;
use App\Models\Kategori; // Kategorileri listelemek için
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Ürünleri listeler.
     */
    public function index()
    {
        $products = Cicek::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Yeni ürün ekleme formunu gösterir.
     */
    public function create()
    {
        $categories = Kategori::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Yeni ürünü veritabanına kaydeder.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'fiyat' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoriler,id',
            'aciklama' => 'required|string',
            'fotograf' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('fotograf');
        $data['slug'] = Str::slug($request->ad) . '-' . uniqid();
        $data['aktif_mi'] = $request->has('aktif_mi');

        if ($request->hasFile('fotograf')) {
            $path = $request->file('fotograf')->store('products', 'public');
            $data['fotograf_yolu'] = 'storage/' . $path;
        }

        Cicek::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Ürün başarıyla eklendi.');
    }

    /**
     * Ürün düzenleme formunu gösterir.
     */
    public function edit(Cicek $product)
    {
        $categories = Kategori::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Ürünü günceller.
     */
    public function update(Request $request, Cicek $product)
    {
        $request->validate([
            'ad' => 'required|string|max:255',
            'fiyat' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategoriler,id',
            'aciklama' => 'required|string',
            'fotograf' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except('fotograf');
        // Slug'ı güncellemek istemeyebiliriz veya isteyebiliriz. Şimdilik dokunmayalım.
        $data['aktif_mi'] = $request->has('aktif_mi');

        if ($request->hasFile('fotograf')) {
            // Eski fotoğrafı sil (Opsiyonel ama iyi olur)
            if ($product->fotograf_yolu) {
                // Storage::disk('public')->delete(str_replace('storage/', '', $product->fotograf_yolu));
            }

            $path = $request->file('fotograf')->store('products', 'public');
            $data['fotograf_yolu'] = 'storage/' . $path;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Ürün güncellendi.');
    }

    /**
     * Ürünü siler.
     */
    public function destroy(Cicek $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Ürün silindi.');
    }
}
