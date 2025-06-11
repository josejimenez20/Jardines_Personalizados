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

        if (!$frecuencia && !$suelo && !$luz && !$espacio) {
            return redirect()->back()->with('error', 'Debes seleccionar al menos un filtro.');
        }

        $query = Planta::query();

        if ($frecuencia) {
            $query->where('frecuencia_agua', $frecuencia);
        }

        if ($suelo) {
            $query->where('tipo_suelo', $suelo);
        }

        if ($luz) {
            $query->where('exposicion_luz', $luz);
        }

        if ($espacio) {
            $query->where('tamano_espacio', $espacio);
        }

        $plantas = $query->get();

        $partes = [];
        if ($suelo) $partes[] = strtolower($suelo);
        if ($luz) $partes[] = strtolower($luz);
        if ($frecuencia) $partes[] = strtolower($frecuencia);
        if ($espacio) $partes[] = strtolower($espacio);

        $mensaje = 'Filtros seleccionados: ' . implode(', ', $partes);

        if ($plantas->isEmpty()) {
            return view('resultados', compact('plantas', 'mensaje'));
        }

        session()->flash('alerta_filtros', 'Estas plantas se han seleccionado según tus preferencias.');

        return view('resultados', compact('plantas', 'mensaje'));
    }
}
