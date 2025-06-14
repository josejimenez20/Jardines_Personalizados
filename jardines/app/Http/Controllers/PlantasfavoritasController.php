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

    // Verificar si ya la tiene en favoritos
    if (!$usuario->plantasFavoritas()->where('planta_id', $id)->exists()) {
        $usuario->plantasFavoritas()->attach($id);
    }

    return redirect()->back()->with('success', Planta::find($id)->nombre . ' ha sido agregada a tus plantas!');
}

public function eliminar($id)
{
    $usuario = Auth::user();

    $usuario->plantasFavoritas()->detach($id);

    return redirect()->back()->with('success', Planta::find($id)->nombre . ' ha sido eliminada de tus plantas.');
}


}
