<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factura;

class FacturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factura::create([
            'tipo_servicio_id' => 1,
            'fecha_facturacion' => now(),
            'estado_id' => 1,
            'paciente_id' => 1,
            'cliente_id' => 1,
            'total' => 150.00,
            'total_cantidad' => 1,
            'tipo_item' => 'biologico',
            'biologico_id' => 1,
            'muestra_id' => null,
            'cantidad' => 1,
            'precio_unitario' => 150.00,
            'subtotal' => 150.00,
        ]);

        Factura::create([
            'tipo_servicio_id' => 2,
            'fecha_facturacion' => now(),
            'estado_id' => 1,
            'paciente_id' => 2,
            'cliente_id' => 1,
            'total' => 200.00,
            'total_cantidad' => 2,
            'tipo_item' => 'muestra',
            'biologico_id' => null,
            'muestra_id' => 1,
            'cantidad' => 2,
            'precio_unitario' => 100.00,
            'subtotal' => 200.00,
        ]);

        Factura::create([
            'tipo_servicio_id' => 1,
            'fecha_facturacion' => now(),
            'estado_id' => 2,
            'paciente_id' => 1,
            'cliente_id' => 2,
            'total' => 300.00,
            'total_cantidad' => 3,
            'tipo_item' => 'biologico',
            'biologico_id' => 2,
            'muestra_id' => null,
            'cantidad' => 3,
            'precio_unitario' => 100.00,
            'subtotal' => 300.00,
        ]);
    }
}
