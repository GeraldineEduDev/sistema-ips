<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EPS;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EPS::create([
            'nombre' => 'EPS Salud Total',
            'direccion' => 'Carrera 45 #67-89',
            'telefono' => '123456789',
            'email' => 'contacto@saludtotal.com',
            'tipo' => 'Contributiva',
        ]);

        EPS::create([
            'nombre' => 'Nueva EPS',
            'direccion' => 'Avenida 20 #12-34',
            'telefono' => '987654321',
            'email' => 'info@nuevoeps.com',
            'tipo' => 'Contributiva',
        ]);

        EPS::create([
            'nombre' => 'EPS Sanitas',
            'direccion' => 'Calle 5 #78-90',
            'telefono' => '456789123',
            'email' => 'servicio@epssanitas.com',
            'tipo' => 'Subsidios',
        ]);
    }
}
