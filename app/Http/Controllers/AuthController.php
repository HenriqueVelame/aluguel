<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // --- PARTE DE LOGIN ---

    public function showLogin() {
        if (Auth::check()) {
            return redirect()->route('cosplays.index');
        }
        return view('auth.login');
    }

    public function login(Request $request) {
        $credenciais = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Digite seu e-mail de acesso.',
            'password.required' => 'A senha é obrigatória.'
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'As credenciais não batem com nossos registros.',
        ])->withInput();
    }

    // --- PARTE DE REGISTRO ---

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', 
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'operador', 
        ]);

        return redirect()->route('login')->with('success', 'Conta criada! Agora você pode logar.');
    }

    // --- LOGOUT ---

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}