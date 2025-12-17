<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cicek;

class SepetController extends Controller
{
    // Sepet Görüntüle
    public function index()
    {
        $sepet = session()->get('sepet', []);
        $toplamFiyat = 0;

        foreach ($sepet as $urun) {
            $toplamFiyat += $urun['fiyat'] * $urun['adet'];
        }

        return view('sepet', compact('sepet', 'toplamFiyat'));
    }

    // Sepete Ekle
    public function add(Request $request)
    {
        $id = $request->id;
        $urun = Cicek::findOrFail($id);
        $sepet = session()->get('sepet', []);

        if (isset($sepet[$id])) {
            $sepet[$id]['adet']++;
        } else {
            $sepet[$id] = [
                "ad" => $urun->ad,
                "adet" => 1,
                "fiyat" => $urun->fiyat,
                "fotograf" => $urun->fotograf_yolu
            ];
        }

        session()->put('sepet', $sepet);

        if ($request->ajax()) {
            return response()->json([
                'success' => 'Ürün sepete eklendi!',
                'cartCount' => count($sepet)
            ]);
        }

        return redirect()->back()->with('success', 'Ürün sepete eklendi!');
    }

    // Ürün Adedi Güncelle (AJAX veya Form ile)
    public function update(Request $request)
    {
        if ($request->id && $request->adet) {
            $sepet = session()->get('sepet');
            $sepet[$request->id]["adet"] = $request->adet;
            session()->put('sepet', $sepet);
            session()->flash('success', 'Sepet güncellendi');
        }
    }

    // Sepetten Sil
    public function remove(Request $request)
    {
        if ($request->id) {
            $sepet = session()->get('sepet');
            if (isset($sepet[$request->id])) {
                unset($sepet[$request->id]);
                session()->put('sepet', $sepet);
            }
            session()->flash('success', 'Ürün sepetten silindi');
        }
        return redirect()->back();
    }
}
