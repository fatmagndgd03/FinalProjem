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
        return view('auth.login'); // 👈 Bu satır view dosyasını çağırır
    }
    
    // ... (store ve destroy metotları)
}
