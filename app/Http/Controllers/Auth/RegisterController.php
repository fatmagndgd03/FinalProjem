<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    // Kayıt formunu gösterir
    public function create()
    {
        return view('auth.register'); // 👈 Bu satır view dosyasını çağırır
    }

    // ... (store metodu)
    public function store(Request $request)
    {
        // ... (kod içeriği)
    }
}
