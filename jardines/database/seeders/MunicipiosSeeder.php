<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            ['nombre' => 'Alegría', 'departamento' => 'Usulután', 'clima' => 'Frío', 'tipo_suelo' => 'Arcilloso', 'exposicion_luz' => 'Sombra', 'frecuencia_agua' => 'Poca frecuencia', 'proposito' => 'Medicinales'],
            ['nombre' => 'Berlín', 'departamento' => 'Usulután', 'clima' => 'Templado', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Semi-sombra', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Frutales'],
            ['nombre' => 'California', 'departamento' => 'Usulután', 'clima' => 'Tropical cálido', 'tipo_suelo' => 'Arenoso', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Diariamente', 'proposito' => 'Decorativas'],
            ['nombre' => 'Concepción Batres', 'departamento' => 'Usulután', 'clima' => 'Tropical cálido', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Ornamentales'],
            ['nombre' => 'El Triunfo', 'departamento' => 'Usulután', 'clima' => 'Templado', 'tipo_suelo' => 'Arcilloso', 'exposicion_luz' => 'Sombra', 'frecuencia_agua' => 'Poca frecuencia', 'proposito' => 'Frutales'],
            ['nombre' => 'Ereguayquín', 'departamento' => 'Usulután', 'clima' => 'Tropical húmedo', 'tipo_suelo' => 'Arenoso', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Diariamente', 'proposito' => 'Decorativas'],
            ['nombre' => 'Estanzuelas', 'departamento' => 'Usulután', 'clima' => 'Frío', 'tipo_suelo' => 'Arcilloso', 'exposicion_luz' => 'Sombra', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Medicinales'],
            ['nombre' => 'Jiquilisco', 'departamento' => 'Usulután', 'clima' => 'Tropical cálido', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Frutales'],
            ['nombre' => 'Jucuapa', 'departamento' => 'Usulután', 'clima' => 'Templado', 'tipo_suelo' => 'Arenoso', 'exposicion_luz' => 'Semi-sombra', 'frecuencia_agua' => 'Poca frecuencia', 'proposito' => 'Suculentas'],
            ['nombre' => 'Jucuarán', 'departamento' => 'Usulután', 'clima' => 'Tropical seco', 'tipo_suelo' => 'Rocoso', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Poca frecuencia', 'proposito' => 'Cactus'],
            ['nombre' => 'Mercedes Umaña', 'departamento' => 'Usulután', 'clima' => 'Templado', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Semi-sombra', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Ornamentales'],
            ['nombre' => 'Nueva Granada', 'departamento' => 'Usulután', 'clima' => 'Tropical húmedo', 'tipo_suelo' => 'Arenoso', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Diariamente', 'proposito' => 'Frutales'],
            ['nombre' => 'Ozatlán', 'departamento' => 'Usulután', 'clima' => 'Frío', 'tipo_suelo' => 'Arcilloso', 'exposicion_luz' => 'Sombra', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Medicinales'],
            ['nombre' => 'Puerto El Triunfo', 'departamento' => 'Usulután', 'clima' => 'Tropical húmedo', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Diariamente', 'proposito' => 'Decorativas'],
            ['nombre' => 'San Agustín', 'departamento' => 'Usulután', 'clima' => 'Templado', 'tipo_suelo' => 'Arenoso', 'exposicion_luz' => 'Semi-sombra', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Ornamentales'],
            ['nombre' => 'San Buenaventura', 'departamento' => 'Usulután', 'clima' => 'Tropical seco', 'tipo_suelo' => 'Rocoso', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Poca frecuencia', 'proposito' => 'Cactus'],
            ['nombre' => 'San Dionisio', 'departamento' => 'Usulután', 'clima' => 'Tropical cálido', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Diariamente', 'proposito' => 'Decorativas'],
            ['nombre' => 'San Francisco Javier', 'departamento' => 'Usulután', 'clima' => 'Frío', 'tipo_suelo' => 'Arcilloso', 'exposicion_luz' => 'Sombra', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Medicinales'],
            ['nombre' => 'Santa Elena', 'departamento' => 'Usulután', 'clima' => 'Tropical húmedo', 'tipo_suelo' => 'Arenoso', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Diariamente', 'proposito' => 'Frutales'],
            ['nombre' => 'Santa María', 'departamento' => 'Usulután', 'clima' => 'Templado', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Semi-sombra', 'frecuencia_agua' => 'Moderada', 'proposito' => 'Suculentas'],
            ['nombre' => 'Santiago de María', 'departamento' => 'Usulután', 'clima' => 'Frío', 'tipo_suelo' => 'Arcilloso', 'exposicion_luz' => 'Sombra', 'frecuencia_agua' => 'Poca frecuencia', 'proposito' => 'Medicinales'],
            ['nombre' => 'Tecapán', 'departamento' => 'Usulután', 'clima' => 'Tropical seco', 'tipo_suelo' => 'Rocoso', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Poca frecuencia', 'proposito' => 'Cactus'],
            ['nombre' => 'Usulután', 'departamento' => 'Usulután', 'clima' => 'Tropical cálido', 'tipo_suelo' => 'Fértil', 'exposicion_luz' => 'Sol pleno', 'frecuencia_agua' => 'Diariamente', 'proposito' => 'Ornamentales'],
        ];

        foreach ($municipios as $municipio) {
            DB::table('municipios')->updateOrInsert(
                ['nombre' => $municipio['nombre']], // condición única
                $municipio
            );
        }
    }
}
