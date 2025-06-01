<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Municipio;

class Pantalla_inicioController extends Controller
{
    public function Pantalla_inicio()
    {
        $user = Auth::user();

        // Busca el municipio asociado al usuario
        $municipio = Municipio::where('nombre', $user->municipio)->first();

        return view('Pantalla_inicio', compact('municipio'));
    }
}


