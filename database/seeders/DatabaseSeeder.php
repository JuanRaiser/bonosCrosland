<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Moto;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(20)->create();
        Moto::factory(20)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        // ]);
        // Moto::factory()->create([
        //     'nombre' => 'Test Moto',
        //     'model' => 'Test Model',
        //     'precio' => 10000,
        //     'bono' => 500,
        //     'precio_base' => 9000,
        // ]);

    }
}
