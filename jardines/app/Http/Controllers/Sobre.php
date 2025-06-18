<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planta;

class Sobre extends Controller
{
    public function sobre()
    {
        return view('sobre');
    }

    public function detalles()
    {
        return view('detalles_plantas');
    }

   public function buscarPorFiltros(Request $request)
{
    $filtros = [
        'frecuencia_agua' => $request->frecuencia_agua,
        'tipo_suelo' => $request->tipo_suelo,
        'exposicion_luz' => $request->exposicion_luz,
        'tamano_espacio' => $request->tamano_espacio
    ];

    $filtrosSeleccionados = array_filter($filtros);

    if (empty($filtrosSeleccionados)) {
        return redirect()->back()->with('error', 'Debes seleccionar al menos un filtro.');
    }

    $cantidadFiltros = count($filtrosSeleccionados);
    $minCoincidencias = match ($cantidadFiltros) {
        1 => 1,
        2 => 2,
        3 => 2,
        4 => 3,
        default => 1,
    };

    $plantas = Planta::all()->map(function ($planta) use ($filtrosSeleccionados) {
        $coincidencias = 0;
        foreach ($filtrosSeleccionados as $campo => $valor) {
            if (strtolower($planta->$campo) === strtolower($valor)) {
                $coincidencias++;
            }
        }
        $planta->coincidencias = $coincidencias;
        return $planta;
    });

    $plantasFiltradas = $plantas->filter(fn($p) => $p->coincidencias >= $minCoincidencias)
                                ->sortByDesc('coincidencias')
                                ->values();

    $mensaje = 'Filtros seleccionados: ' . implode(', ', array_map('strtolower', array_values($filtrosSeleccionados)));

    if ($plantasFiltradas->isEmpty()) {
        session()->flash('alerta_filtros', '');
        return view('resultados', [
            'plantas' => $plantasFiltradas,
            'mensaje' => $mensaje
        ]);
    }

    session()->flash('alerta_filtros', 'Estas plantas se han seleccionado según tus preferencias.');
    return view('resultados', [
        'plantas' => $plantasFiltradas,
        'mensaje' => $mensaje
    ]);
}

}
