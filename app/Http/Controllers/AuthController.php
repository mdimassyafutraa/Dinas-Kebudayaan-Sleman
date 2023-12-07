<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.formLogin');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Berhasil login, selamat datang');
        }

        return redirect('login')->with('error', 'Akun tidak valid');
    }

    function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'Berhasil Logout');
    }
}
