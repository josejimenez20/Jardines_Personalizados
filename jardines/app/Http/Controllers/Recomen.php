<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Municipio;

class Recomen extends Controller
{
    public function recomen()
    {
        $user = Auth::user();

        if (!$user || !$user->municipio) {
            return redirect()->route('mi_perfil')->with('error', 'Por favor, selecciona tu municipio en el perfil.');
        }

        $municipioData = Municipio::where('nombre', $user->municipio)->first();

        if (!$municipioData) {
            return redirect()->route('mi_perfil')->with('error', 'No se encontraron datos del municipio.');
        }

        return view('recomen', [
            'municipio' => $municipioData
        ]);
    }
}
