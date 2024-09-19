<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'tipo_documento' => 'Cédula de Ciudadanía',
            'documento' => '123456780',
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'razon_social' => null,
            'telefono' => '3001234567',
            'email' => 'juan.perez@example.com',
            'direccion' => 'Calle 1 #23-45',
            'tipo_cliente' => 'Persona Natural',
        ]);

        Cliente::create([
            'tipo_documento' => 'NIT',
            'documento' => '9001234568',
            'nombres' => '',
            'apellidos' => '',
            'razon_social' => 'Empresa ABC',
            'telefono' => '4009876543',
            'email' => 'contacto@empresaabc.com',
            'direccion' => 'Carrera 2 #45-67',
            'tipo_cliente' => 'Persona Jurídica',
        ]);

        Cliente::create([
            'tipo_documento' => 'Cédula de Extranjería',
            'documento' => '987654322',
            'nombres' => 'Maria',
            'apellidos' => 'García',
            'razon_social' => null,
            'telefono' => '3059876543',
            'email' => 'maria.garcia@example.com',
            'direccion' => 'Avenida 3 #89-12',
            'tipo_cliente' => 'Persona Natural',
        ]);
    }
}
