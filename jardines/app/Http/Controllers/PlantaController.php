<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;
use Illuminate\Support\Facades\Auth;

class PlantaController extends Controller
{
    public function mostrarPorMunicipio()
    {
        $usuario = Auth::user();

        // Si el usuario no tiene municipio asignado
        if (!$usuario || !$usuario->municipio) {
            return redirect()->route('mi_perfil')->with('error', 'Por favor selecciona tu municipio en tu perfil.');
        }

        // Obtener plantas del municipio del usuario
        $plantas = Planta::whereHas('municipio', function ($query) use ($usuario) {
            $query->where('nombre', $usuario->municipio);
        })->get();

        return view('resultados', compact('plantas'));
    }
}

