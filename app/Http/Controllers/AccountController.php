<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // ======================================================
    // PAGE
    // ======================================================

    public function index()
    {
        return view('account');
    }

    // ======================================================
    // UPDATE ACCOUNT
    // ======================================================

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([

            'email' => [
                'required',
                'email'
            ],

            'password' => [
                'nullable',
                'confirmed',
                'min:6'
            ]

        ]);

        // ==========================================
        // UPDATE EMAIL
        // ==========================================

        $user->email =
            $request->email;

        // ==========================================
        // UPDATE PASSWORD
        // ==========================================

        if($request->password)
        {
            $user->password =
                Hash::make(
                    $request->password
                );
        }

        $user->save();

        return back()->with(
            'success',
            'Account Updated'
        );
    }
}