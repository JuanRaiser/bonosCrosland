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
        // Moto::factory(20)->create();

        $motos=[
            ['nombre'=>'Pulsar', 'model'=>'CT 125', 'precio'=>5500.00, 'bono'=>0.00, 'precio_base'=>5500.00],
            ['nombre'=>'Boxer', 'model'=>'150', 'precio'=>6300.00, 'bono'=>100.00, 'precio_base'=>6100.00],
            ['nombre'=>'Discover', 'model'=>'125', 'precio'=>7200.00, 'bono'=>1200.00, 'precio_base'=>6000.00],
            ['nombre'=>'Pulsar', 'model'=>'125 LS', 'precio'=>7800.00, 'bono'=>1000.00, 'precio_base'=>6700.00],
            ['nombre'=>'Pulsar', 'model'=>'150 Neon', 'precio'=>8600.00, 'bono'=>0.00, 'precio_base'=>8600.00],
            ['nombre'=>'Pulsar', 'model'=>'150 R', 'precio'=>9300.00, 'bono'=>000.00, 'precio_base'=>9300.00],
            ['nombre'=>'Pulsar', 'model'=>'180 Neon', 'precio'=>10100.00, 'bono'=>600.00, 'precio_base'=>9500.00],
            ['nombre'=>'Pulsar', 'model'=>'N 160', 'precio'=>10600.00, 'bono'=>1000.00, 'precio_base'=>9600.00],
            ['nombre'=>'Pulsar', 'model'=>'160 NS UG2', 'precio'=>12400.00, 'bono'=>600.00, 'precio_base'=>11800.00],
            ['nombre'=>'Pulsar', 'model'=>'200 NS UG2', 'precio'=>14300.00, 'bono'=>1500.00, 'precio_base'=>14300.00],
            ['nombre'=>'Pulsar', 'model'=>'RS 200', 'precio'=>16500.00, 'bono'=>00.00, 'precio_base'=>16500.00],
            ['nombre'=>'Pulsar', 'model'=>'N 250', 'precio'=>13600.00, 'bono'=>00.00, 'precio_base'=>13600.00],
            ['nombre'=>'Pulsar', 'model'=>'N 250 UG', 'precio'=>14500.00, 'bono'=>00.00, 'precio_base'=>14500.00],
            ['nombre'=>'Pulsar', 'model'=>'400 NS', 'precio'=>19500.00, 'bono'=>0.00, 'precio_base'=>19500.00],
            ['nombre'=>'Dominar', 'model'=>'250', 'precio'=>14900.00, 'bono'=>0.00, 'precio_base'=>14900.00],
            ['nombre'=>'Dominar', 'model'=>'400', 'precio'=>19000.00, 'bono'=>0.00, 'precio_base'=>19000.00],
            ['nombre'=>'Torito', 'model'=>'Clasico', 'precio'=>20900.00, 'bono'=>1000.00, 'precio_base'=>19900.00],
            ['nombre'=>'Torito', 'model'=>'X Sport', 'precio'=>22300.00, 'bono'=>1000.00, 'precio_base'=>21300.00],
            ['nombre'=>'Torito', 'model'=>'Clasico 2025', 'precio'=>20900.00, 'bono'=>1000.00, 'precio_base'=>19900.00],
            ['nombre'=>'Torito', 'model'=>'Raptor S lujo', 'precio'=>23400.00, 'bono'=>1000.00, 'precio_base'=>22400.00],
        ];
        foreach ($motos as $moto) {
            Moto::create($moto);
        }

    }
}
