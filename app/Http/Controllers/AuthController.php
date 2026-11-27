<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Kayıt sayfası
    public function registerPage()
    {
        return view('auth.register');
    }

    // Kayıt işlemi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // User modelindeki 'hashed' cast otomatik şifreler
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // Giriş sayfası
    public function loginPage()
    {
        return view('auth.login');
    }

    // Giriş işlemi
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'E-posta ya da parola hatalı.',
        ])->onlyInput('email');
    }

    // Çıkış işlemi
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Kullanıcı paneli
    public function dashboard()
    {
        return view('dashboard');
    }
}
