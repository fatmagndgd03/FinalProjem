<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class ProfileController extends Controller
{
    /**
     * Profil sayfasını görüntüler.
     */
    public function show()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        $orders = $user->orders()->latest()->get();

        return view('profil', compact('user', 'addresses', 'orders'));
    }

    /**
     * Kullanıcı bilgilerini günceller.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($request->only('name', 'email', 'phone'));

        return back()->with('success', 'Profil bilgileriniz güncellendi.');
    }

    /**
     * Yeni adres ekler.
     */
    public function storeAddress(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'address' => 'required|string',
            'city' => 'required|string|max:50',
        ]);

        Auth::user()->addresses()->create($request->all());

        return back()->with('success', 'Yeni adres başarıyla eklendi.');
    }

    /**
     * Adresi siler.
     */
    public function destroyAddress(Address $address)
    {
        if ($address->user_id !== Auth::id()) {
            abort(403);
        }

        $address->delete();

        return back()->with('success', 'Adres silindi.');
    }
}
