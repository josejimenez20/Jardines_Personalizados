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
    // Normaliza las respuestas del usuario
    $mapFrecuencia = [
        'Mucho' => 'alto',
        'Regular' => 'moderado',
        'Poco' => 'bajo',
        'Nunca' => 'nulo'
    ];

    $mapSuelo = [
        'Arenoso' => 'arenoso',
        'Arcilloso' => 'arcilloso',
        'Fértil' => 'fértil',
        'Ácido' => 'ácido'
    ];

    $mapLuz = [
        'Sombra' => 'sombra',
        'Semi sombra' => 'sombra parcial',
        'Sol pleno' => 'sol pleno'
    ];

    // Obtener valores mapeados
    $frecuencia = $mapFrecuencia[$request->frecuencia_agua] ?? null;
    $suelo = $mapSuelo[$request->tipo_suelo] ?? null;
    $luz = $mapLuz[$request->exposicion_luz] ?? null;

    $plantas = \App\Models\Planta::query()
        ->when($frecuencia, fn($q) => $q->where('frecuencia_agua', $frecuencia))
        ->when($suelo, fn($q) => $q->where('tipo_suelo', $suelo))
        ->when($luz, fn($q) => $q->where('exposicion_luz', $luz))
        ->get();

    $mensaje = "Basado en: Suelo {$suelo}, {$luz}, riego {$frecuencia}";

    return view('resultados', compact('plantas', 'mensaje'));
    }
}