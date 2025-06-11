<?php
namespace App\Http\Controllers;

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

        $municipioNombre = $usuario->municipio;

        $plantas = Planta::whereHas('municipio', function ($query) use ($municipioNombre) {
            $query->where('nombre', $municipioNombre);
        })->get();

        $plantaReferencia = Planta::whereHas('municipio', function ($query) use ($municipioNombre) {
            $query->where('nombre', $municipioNombre);
        })->first();

        $mensaje = null;

        if ($plantaReferencia) {
            $partes = [];
            if ($plantaReferencia->clima) $partes[] = strtolower($plantaReferencia->clima);
            if ($plantaReferencia->tipo_suelo) $partes[] = strtolower($plantaReferencia->tipo_suelo);
            if ($plantaReferencia->exposicion_luz) $partes[] = strtolower($plantaReferencia->exposicion_luz);
            if ($plantaReferencia->frecuencia_agua) $partes[] = strtolower($plantaReferencia->frecuencia_agua);

            $mensaje = 'Basado en: ' . implode(', ', $partes);
        }

        session()->flash('alerta_municipio', "Estas plantas se han seleccionado según tu municipio {$municipioNombre}");

        return view('resultados', compact('plantas', 'mensaje'));
    }

    public function verDetalle($id)
    {
        $planta = Planta::findOrFail($id);
        return view('detalles_plantas', compact('planta'));
    }
}
