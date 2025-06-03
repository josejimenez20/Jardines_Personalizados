<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('plantas')->insert([
            [
                'nombre' => 'Hibisco',
                'nombre_cientifico' => 'Hibiscus rosa-sinensis',
                'clima' => 'tropical cálido',
                'tipo_suelo' => 'arenoso',
                'frecuencia_agua' => 'moderado',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'ornamental',
                'descripcion' => 'Arbusto tropical de flores grandes y vistosas.',
                'imagen' => 'hibisco.jpg',
                'municipio_id' => 1, 
                'created_at' => now(),
                'updated_at' => now()
            ],

            
            // Agregaremos más registros por municipio aquí
        ]);
    }
}
