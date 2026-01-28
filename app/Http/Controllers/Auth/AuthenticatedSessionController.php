<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $role = $request->user()->role;

        if ($role === 'verifikator' || $role === 'reviewer') {
            return redirect()->route('admin.dashboard');
        }

        // Jika role adalah pegawai, arahkan ke dashboard user
        if ($role === 'pegawai') {
            return redirect()->route('dashboard');
        }

        // Default redirect jika tidak cocok
        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

        protected function authenticated(Request $request, $user)
    {
        // Jika login sukses, redirect ke dashboard
        return redirect()->route('dashboard');
    }

}
    
