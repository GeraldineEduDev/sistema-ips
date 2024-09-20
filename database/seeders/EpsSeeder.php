<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Eps;

class EpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eps::create([
            'nombre' => 'EPS Salud Total',
            'direccion' => 'Calle 123 #45-67',
            'telefono' => '3001234567',
            'email' => 'contacto@saludtotal.com',
            'tipo' => 'Contributivo',
        ]);

        Eps::create([
            'nombre' => 'EPS Sanitas',
            'direccion' => 'Carrera 89 #12-34',
            'telefono' => '3119876543',
            'email' => 'info@epssanitas.com',
            'tipo' => 'Subsidiado',
        ]);

        Eps::create([
            'nombre' => 'EPS Sura',
            'direccion' => 'Avenida 45 #78-90',
            'telefono' => '3123456789',
            'email' => 'contacto@sura.com',
            'tipo' => 'Contributivo',
        ]);
    }
}
