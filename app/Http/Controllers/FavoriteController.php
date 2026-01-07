<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cicek;

class FavoriteController extends Controller
{
    /**
     * Kullanıcının favori durumunu değiştirir (Ekle/Çıkar).
     */
    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'Favorilere eklemek için lütfen giriş yapın.'], 401);
        }

        $request->validate([
            'id' => 'required|exists:cicekler,id',
        ]);

        $user = Auth::user();
        $cicekId = $request->input('id');

        // Toggle metodu varsa çıkarır, yoksa ekler
        $attached = $user->favorites()->toggle($cicekId);

        // attached array'i doluysa eklenmiştir, boşsa çıkarılmıştır
        $status = count($attached['attached']) > 0 ? 'added' : 'removed';

        return response()->json([
            'status' => 'success',
            'action' => $status,
            'message' => $status === 'added' ? 'Ürün favorilere eklendi.' : 'Ürün favorilerden çıkarıldı.'
        ]);
    }

    /**
     * Kullanıcının favori ürünlerini listeleme sayfası.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Favorilerinizi görmek için giriş yapmalısınız.');
        }

        $favorites = Auth::user()->favorites()->with('kategori')->orderBy('favorites.created_at', 'desc')->paginate(12);

        return view('favoriler', compact('favorites'));
    }
}
