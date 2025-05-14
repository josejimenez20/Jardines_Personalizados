<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Mi_perfilController extends Controller
{
    public function Mi_perfil()
    {
        return view('mi_perfil');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::guard()->user();
        if (!$user instanceof \App\Models\User) {
            return back()->withErrors(['user' => 'Usuario no válido.']);
        }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', '¡Contraseña actualizada con éxito!');
    }

// Cambiar correo
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();

        if (!$user instanceof \App\Models\User) {
            return back()->withErrors(['user' => 'Usuario no válido.']);
        }

        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Correo actualizado correctamente.');
    }


    // Eliminar cuenta
    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        if (!$user instanceof \App\Models\User) {
            return back()->withErrors(['user' => 'Usuario no válido.']);
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }
}    

