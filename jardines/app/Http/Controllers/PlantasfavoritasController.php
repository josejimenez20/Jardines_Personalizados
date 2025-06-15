<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Planta;

class PlantasfavoritasController extends Controller
{
    public function plantasfavoritas()
    {
        // Obtener usuario autenticado
        $usuario = Auth::user();

        // Obtener las plantas favoritas del usuario
        $plantas = $usuario->plantasFavoritas()->get();

        return view('plantasfavoritas', compact('plantas'));
    }

    public function agregar($id)
{
    $usuario = Auth::user();

    // Si ya está en favoritos, responder con JSON personalizado
    if ($usuario->plantasFavoritas()->where('planta_id', $id)->exists()) {
        return response()->json(['estado' => 'existe']);
    }

    $usuario->plantasFavoritas()->attach($id);

    // Devuelve confirmación en JSON
    return response()->json(['estado' => 'agregado']);
}

public function eliminar($id)
{
    $usuario = Auth::user();

    $usuario->plantasFavoritas()->detach($id);

    return redirect()->back()->with('success', Planta::find($id)->nombre . ' ha sido eliminada de tus plantas.');
}


}
