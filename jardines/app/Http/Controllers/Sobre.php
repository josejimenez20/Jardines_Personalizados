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
    $frecuencia = $request->frecuencia_agua;
    $suelo = $request->tipo_suelo;
    $luz = $request->exposicion_luz;
    $espacio = $request->tamano_espacio;

    // Verifica si al menos uno de los filtros tiene valor
    if (!$frecuencia && !$suelo && !$luz && !$espacio) {
        return redirect()->back()->with('error', 'Debes seleccionar al menos un filtro.');
    }

    // Construye la consulta condicionalmente según los filtros presentes
    $plantas = Planta::query()
        ->when($frecuencia, fn($q) => $q->orWhere('frecuencia_agua', $frecuencia))
        ->when($suelo, fn($q) => $q->orWhere('tipo_suelo', $suelo))
        ->when($luz, fn($q) => $q->orWhere('exposicion_luz', $luz))
        ->when($espacio, fn($q) => $q->orWhere('tamano_espacio', $espacio))
        ->get();

    // Crear mensaje con los filtros usados
    $partes = [];
    if ($suelo) $partes[] = "suelo " . strtolower($suelo);
    if ($luz) $partes[] = strtolower($luz);
    if ($frecuencia) $partes[] = "riego " . strtolower($frecuencia);
    if ($espacio) $partes[] = "espacio " . strtolower($espacio);

    $mensaje = 'Basado en: ' . implode(', ', $partes);

    return view('resultados', compact('plantas', 'mensaje'));
}

}