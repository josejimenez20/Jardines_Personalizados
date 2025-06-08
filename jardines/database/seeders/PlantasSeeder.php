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
                'nombre' => 'Aloe Vera',
                'nombre_cientifico' => 'Aloe barbadensis',
                'clima' => 'tropical seco',
                'tipo_suelo' => 'arenoso',
                'frecuencia_agua' => 'bajo',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'medicinal',
                'descripcion' => 'Planta suculenta usada en medicina natural.',
                'imagen' => 'aloe_vera.webp',
                'municipio_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Coleo Común',
                'nombre_cientifico' => 'Solenostemon scutellarioides',
                'clima' => 'tropical húmedo',
                'tipo_suelo' => 'fértil',
                'frecuencia_agua' => 'moderado',
                'exposicion_luz' => 'sombra parcial',
                'proposito' => 'ornamental',
                'descripcion' => 'Planta de colores vivos ideal para jardines.',
                'imagen' => 'coleo_comun.webp',
                'municipio_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Corazón de Jesús',
                'nombre_cientifico' => 'Caladium bicolor',
                'clima' => 'tropical',
                'tipo_suelo' => 'ácido',
                'frecuencia_agua' => 'alto',
                'exposicion_luz' => 'sombra',
                'proposito' => 'ornamental',
                'descripcion' => 'Hojas decorativas de gran belleza.',
                'imagen' => 'corazon_de_jesus.webp',
                'municipio_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Corona de Espinas',
                'nombre_cientifico' => 'Euphorbia milii',
                'clima' => 'cálido seco',
                'tipo_suelo' => 'pobre',
                'frecuencia_agua' => 'bajo',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'ornamental',
                'descripcion' => 'Planta resistente con espinas y flores pequeñas.',
                'imagen' => 'corona_de_espinas.webp',
                'municipio_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Flor Flamengo',
                'nombre_cientifico' => 'Anthurium andraeanum',
                'clima' => 'húmedo tropical',
                'tipo_suelo' => 'orgánico',
                'frecuencia_agua' => 'moderado',
                'exposicion_luz' => 'sombra parcial',
                'proposito' => 'ornamental',
                'descripcion' => 'Flor vistosa usada en arreglos florales.',
                'imagen' => 'flor_flamengo.webp',
                'municipio_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Hibisco Chino',
                'nombre_cientifico' => 'Hibiscus rosa-sinensis',
                'clima' => 'tropical cálido',
                'tipo_suelo' => 'arenoso',
                'frecuencia_agua' => 'moderado',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'ornamental',
                'descripcion' => 'Arbusto tropical de flores grandes y vistosas.',
                'imagen' => 'hibisco_chino.webp',
                'municipio_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Llama del Bosque',
                'nombre_cientifico' => 'Ixora coccinea',
                'clima' => 'tropical húmedo',
                'tipo_suelo' => 'ácido',
                'frecuencia_agua' => 'moderado',
                'exposicion_luz' => 'sol parcial',
                'proposito' => 'ornamental',
                'descripcion' => 'Flores pequeñas y agrupadas, muy coloridas.',
                'imagen' => 'llama_del_bosque.webp',
                'municipio_id' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Manglar Rojo',
                'nombre_cientifico' => 'Rhizophora mangle',
                'clima' => 'costero tropical',
                'tipo_suelo' => 'salino',
                'frecuencia_agua' => 'alto',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'ecológico',
                'descripcion' => 'Planta de zonas costeras que protege el ecosistema.',
                'imagen' => 'manglar_rojo.webp',
                'municipio_id' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Mango',
                'nombre_cientifico' => 'Mangifera indica',
                'clima' => 'tropical seco',
                'tipo_suelo' => 'franco',
                'frecuencia_agua' => 'moderado',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'frutal',
                'descripcion' => 'Árbol frutal popular en El Salvador.',
                'imagen' => 'mango.webp',
                'municipio_id' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Maíz',
                'nombre_cientifico' => 'Zea mays',
                'clima' => 'tropical',
                'tipo_suelo' => 'fértil',
                'frecuencia_agua' => 'alto',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'alimenticio',
                'descripcion' => 'Cultivo básico de la dieta salvadoreña.',
                'imagen' => 'maiz.webp',
                'municipio_id' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Orquídea',
                'nombre_cientifico' => 'Orchidaceae',
                'clima' => 'templado húmedo',
                'tipo_suelo' => 'orgánico',
                'frecuencia_agua' => 'alto',
                'exposicion_luz' => 'luz filtrada',
                'proposito' => 'ornamental',
                'descripcion' => 'Planta exótica de alto valor decorativo.',
                'imagen' => 'orquidea.webp',
                'municipio_id' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Pimiento',
                'nombre_cientifico' => 'Capsicum annuum',
                'clima' => 'tropical húmedo',
                'tipo_suelo' => 'fértil',
                'frecuencia_agua' => 'moderado',
                'exposicion_luz' => 'sol parcial',
                'proposito' => 'alimenticio',
                'descripcion' => 'Planta hortícola muy usada en la cocina.',
                'imagen' => 'pimiento.webp',
                'municipio_id' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Planta de Serpiente',
                'nombre_cientifico' => 'Sansevieria trifasciata',
                'clima' => 'seco',
                'tipo_suelo' => 'pobre',
                'frecuencia_agua' => 'bajo',
                'exposicion_luz' => 'sombra parcial',
                'proposito' => 'interior',
                'descripcion' => 'Planta resistente, ideal para interiores.',
                'imagen' => 'planta_de_serpiente.webp',
                'municipio_id' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Tomate',
                'nombre_cientifico' => 'Solanum lycopersicum',
                'clima' => 'tropical',
                'tipo_suelo' => 'fértil',
                'frecuencia_agua' => 'alto',
                'exposicion_luz' => 'sol pleno',
                'proposito' => 'alimenticio',
                'descripcion' => 'Fruto comestible ampliamente cultivado.',
                'imagen' => 'tomate.webp',
                'municipio_id' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
