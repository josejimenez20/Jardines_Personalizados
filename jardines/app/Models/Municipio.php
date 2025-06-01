<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected $fillable = [
        'nombre',
        'departamento',
        'clima',
        'tipo_suelo',
        'exposicion_luz',
        'frecuencia_agua',
        'proposito',
    ];

    public $timestamps = false;
}


