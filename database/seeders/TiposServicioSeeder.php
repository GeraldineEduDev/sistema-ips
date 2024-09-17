<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_servicio')->insert([
            ['nombre' => 'Vacunación'],
            ['nombre' => 'Muestra'],
            ['nombre' => 'Vacunación y Toma de Muestra'],
        ]);
    }
}
