<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biologico;

class BiologicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biologico::create([
            'nombre' => 'Vacuna ABC',
            'tipo' => 'Inmunización',
            'precio' => 50.00,
            'presentacion' => 'Frasco de 10ml',
            'marca' => 'Marca X',
            'laboratorio' => 'Laboratorio Y',
            'fecha_expiracion' => '2025-12-31',
            'lote' => 'LOT12345',
        ]);

        Biologico::create([
            'nombre' => 'Vacuna DEF',
            'tipo' => 'Inmunización',
            'precio' => 75.00,
            'presentacion' => 'Frasco de 5ml',
            'marca' => 'Marca Z',
            'laboratorio' => 'Laboratorio A',
            'fecha_expiracion' => '2026-06-30',
            'lote' => 'LOT67890',
        ]);

        Biologico::create([
            'nombre' => 'Vacuna GHI',
            'tipo' => 'Inmunización',
            'precio' => 65.00,
            'presentacion' => 'Frasco de 15ml',
            'marca' => 'Marca B',
            'laboratorio' => 'Laboratorio C',
            'fecha_expiracion' => '2027-03-15',
            'lote' => 'LOT54321',
        ]);
    }
}
