<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Muestra;

class MuestrasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Muestra::create([
            'nombre' => 'Muestra de Sangre',
            'precio' => 30.00,
        ]);

        Muestra::create([
            'nombre' => 'Muestra de Orina',
            'precio' => 15.00,
        ]);

        Muestra::create([
            'nombre' => 'Muestra de Saliva',
            'precio' => 10.00,
        ]);
    }
}
