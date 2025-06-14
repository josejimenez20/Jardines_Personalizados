<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;

    protected $table = 'plantas';

    protected $fillable = [
        'nombre',
        'nombre_cientifico',
        'clima',
        'tipo_suelo',
        'frecuencia_agua',
        'exposicion_luz',
        'proposito',
        'descripcion',
        'imagen',
        'tamano_espacio',
        'municipio_id',
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    // ✅ Relación: muchos usuarios que marcaron esta planta como favorita
    public function usuariosFavoritos()
    {
        return $this->belongsToMany(User::class, 'planta_usuario')->withTimestamps();
    }
}
