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
        // =====================================
        // LOGIN AUTHENTICATION
        // =====================================

        $request->authenticate();

        // =====================================
        // REGENERATE SESSION
        // =====================================

        $request->session()->regenerate();

        // =====================================
        // OWNER LOGIN
        // =====================================

        if (Auth::user()->role == 'owner')
        {
            return redirect('/dashboard');
        }

        // =====================================
        // COURIER LOGIN
        // =====================================

        if (Auth::user()->role == 'courier')
        {
            return redirect('/delivery');
        }

        // =====================================
        // DEFAULT
        // =====================================

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // =====================================
        // LOGOUT
        // =====================================

        Auth::guard('web')->logout();

        // =====================================
        // INVALIDATE SESSION
        // =====================================

        $request->session()->invalidate();

        // =====================================
        // REGENERATE TOKEN
        // =====================================

        $request->session()->regenerateToken();

        // =====================================
        // REDIRECT LOGIN
        // =====================================

        return redirect('/');
    }
}