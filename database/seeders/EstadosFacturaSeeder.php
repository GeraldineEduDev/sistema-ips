<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosFacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados_factura')->insert([
            ['nombre' => 'Pendiente'],
            ['nombre' => 'Pagada'],
            ['nombre' => 'Anulada'],
        ]);
    }
}
