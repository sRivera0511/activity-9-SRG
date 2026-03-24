<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar el login.
    public function showLogin()
    {
        return view('auth.login');
    }

    // Procesar el login.
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::atempt($credentials)) 
            {
                return redirect('/dashboard');
            }

            return back()->with('error', 'Credenciales incorrectas');
    }

    // Mostrar el registro.
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesar el registro.
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth:login($user);

        return redirect('/dashboard');
    }

    // Salir de la sesión
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
