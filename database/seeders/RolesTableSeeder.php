<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['nombre' => 'Superusuario'],
            ['nombre' => 'Administrador'],
            ['nombre' => 'Facturador'],
            ['nombre' => 'Auxiliar'],
            ['nombre' => 'Paciente'],
        ]);
    }
}
