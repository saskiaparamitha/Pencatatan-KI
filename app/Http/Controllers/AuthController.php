<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Redirect berdasarkan role
            if ($user->role === 'pegawai') {
                return redirect()->intended(route('user.dashboard'));
            }

            if (in_array($user->role, ['verifikator', 'reviewer'])) {
                return redirect()->intended(route('admin.dashboard'));
            }

            // Fallback jika role tidak dikenali
            Auth::logout();
            return back()->withErrors([
                'email' => 'Role pengguna tidak valid.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
       return redirect()->route('login');
    }
}