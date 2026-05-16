<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * SHOW REGISTER PAGE
     */

    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * STORE USER
     */

    public function store(Request $request): RedirectResponse
    {
        // ==========================================
        // VALIDATION
        // ==========================================

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:' . User::class
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],

            'vehicle_plate' => [
                'required',
                'string',
                'max:50'
            ],

        ]);

        // ==========================================
        // CREATE USER
        // ==========================================

        $user = User::create([

            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            'role' => 'courier',

            'vehicle_plate' => $validated['vehicle_plate'],

        ]);

        // ==========================================
        // REGISTER EVENT
        // ==========================================

        event(new Registered($user));

        // ==========================================
        // AUTO LOGIN
        // ==========================================

        Auth::login($user);

        // ==========================================
        // REDIRECT
        // ==========================================

        return redirect('/login');

        // OR USE:
        // return redirect('/delivery');
    }
}