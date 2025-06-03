<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'municipio' => 'usulutan',
            ]
        );

        $this->call([
            MunicipiosSeeder::class,
            PlantasSeeder::class,
        ]);
    }  
}
