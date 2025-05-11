<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    // Función de login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return redirect()->back()->with('error', 'Email o contraseña incorrectos, por favor intenta de nuevo.');
    }

    // Función de registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'municipio' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Encriptar contraseña
        $user->municipio = $request->municipio;
        $user->save();

        return redirect()->back()->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

}

