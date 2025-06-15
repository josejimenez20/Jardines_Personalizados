<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Mi_perfilController extends Controller
{
    public function Mi_perfil()
    {
        return view('mi_perfil');
    }

    // Cambiar contraseña
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = \App\Models\User::find(Auth::id());
        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es valida']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Tu contraseña ha sido actualizada con exito');
    }

    // Cambiar correo electrónico
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ], [
            'email.regex' => 'El correo ingeresado no es valido',
        ]);

        $user = \App\Models\User::find(Auth::id());
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'Tu correo ha sido actualizado correctamente');
    }

    // Eliminar cuenta
    public function deleteAccount(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());

        Auth::logout();

        if ($user) {
            $user->delete();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }
}
