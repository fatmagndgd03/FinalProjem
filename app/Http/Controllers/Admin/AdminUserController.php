<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin.users.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'E-posta adresi zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.exists' => 'Bu e-posta adresi sistemde kayıtlı değil. Lütfen önce kullanıcının kayıt olduğundan emin olun.',
        ]);

        $currentAdminCount = User::where('role', 'admin')->count();

        if ($currentAdminCount >= 3) {
            return back()->with('error', 'Maksimum yönetici sayısına (3) ulaşıldı. Yeni yönetici ekleyemezsiniz.');
        }

        $user = User::where('email', $request->email)->first();

        if ($user->role === 'admin') {
            return back()->with('error', 'Bu kullanıcı zaten yönetici.');
        }

        $user->role = 'admin';
        $user->save();

        return back()->with('success', 'Kullanıcı başarıyla yönetici yapıldı.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Kendinizi yöneticilikten çıkaramazsınız.');
        }

        $user->role = 'customer'; // Or whatever default role is
        $user->save();

        return back()->with('success', 'Kullanıcının yönetici yetkisi alındı.');
    }
}
