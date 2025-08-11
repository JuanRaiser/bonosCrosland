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

        // Crear un usuario con los campos especificados
        User::create([
            'name' => 'Usuario Ejemplo',
            'email' => 'usuario@ejemplo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

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
