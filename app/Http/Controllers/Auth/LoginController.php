<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Giriş formunu gösterir
    public function create()
    {
        return view('auth.login');
    }

    // Giriş işlemini gerçekleştirir
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        throw ValidationException::withMessages([
            'email' => 'Girdiğiniz bilgiler kayıtlarımızla eşleşmiyor.',
        ]);
    }

    // Çıkış işlemini gerçekleştirir
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
