<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
