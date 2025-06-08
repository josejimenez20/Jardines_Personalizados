<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Municipio;

class Pantalla_inicioController extends Controller
{
    public function Pantalla_inicio()
    {
        $user = Auth::user();

        // Verificar si el usuario está autenticado
        if (!$user) {
            return redirect()->route('login')->with('error', 'Por favor, inicia sesión.');
        }

        // Buscar el municipio asociado al usuario
        $municipio = Municipio::where('nombre', $user->municipio)->first();

        // Verificar si el municipio fue encontrado
        if (!$municipio) {
            return view('pantalla_inicio')->with('error', 'No se encontró el municipio correspondiente.');
        }

        return view('pantalla_inicio', compact('municipio'));
    }

}
