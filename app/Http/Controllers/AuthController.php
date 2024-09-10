<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan formulir login
    public function showLoginForm()
    {
        return view('login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mendapatkan kredensial dari input
        $credentials = $request->only('email', 'password');

        // Cek apakah kredensial valid
        if (Auth::attempt($credentials)) {
            // Login berhasil, redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // Login gagal, redirect kembali ke formulir login dengan pesan error
        return redirect()->route('login.form')->with('error', 'Invalid credentials.');
    }

    // Menangani proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
