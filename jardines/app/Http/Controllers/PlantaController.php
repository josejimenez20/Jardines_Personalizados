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

    if (!$usuario || !$usuario->municipio) {
        return redirect()->route('mi_perfil')->with('error', 'Por favor selecciona tu municipio en tu perfil.');
    }
    // Obtener el nombre del municipio del usuario autenticado
    $municipioNombre = $usuario->municipio;

    // Obtener plantas del municipio
    $plantas = Planta::whereHas('municipio', function ($query) use ($municipioNombre) {
        $query->where('nombre', $municipioNombre);
    })->get();

    // Obtener un ejemplo de planta del municipio para extraer los datos y construir el mensaje
    $plantaReferencia = Planta::whereHas('municipio', function ($query) use ($municipioNombre) {
        $query->where('nombre', $municipioNombre);
    })->first();

    $mensaje = null;

    if ($plantaReferencia) {
        $mensaje = 'Basado en: Clima ' . strtolower($plantaReferencia->clima) .
            ', suelo ' . strtolower($plantaReferencia->tipo_suelo) .
            ', ' . strtolower($plantaReferencia->exposicion_luz) .
            ', riego ' . strtolower($plantaReferencia->frecuencia_agua);

        if (!empty($plantaReferencia->proposito)) {
            $mensaje .= ', propósito ' . strtolower($plantaReferencia->proposito);
        }
    }

    return view('resultados', compact('plantas', 'mensaje'));
}
    public function verDetalle($id)
{
    $planta = Planta::findOrFail($id);
    return view('detalles_plantas', compact('planta'));
}

}

