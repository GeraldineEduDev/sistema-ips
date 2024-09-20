<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paciente::create([
            'tipo_documento' => 'Cédula',
            'documento' => '123456789',
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'fecha_nacimiento' => '1990-01-15',
            'telefono' => '3001234567',
            'email' => 'juan.perez@example.com',
            'tipo_sangre' => 'O+',
            'expedicion_documento' => '2010-01-01',
            'alergias' => 'Ninguna',
            'sexo' => 'Masculino',
            'genero' => 'Hombre',
            'eps_id' => 1, 
        ]);

        Paciente::create([
            'tipo_documento' => 'Cédula',
            'documento' => '987654321',
            'nombres' => 'María',
            'apellidos' => 'González',
            'fecha_nacimiento' => '1985-05-20',
            'telefono' => '3109876543',
            'email' => 'maria.gonzalez@example.com',
            'tipo_sangre' => 'A+',
            'expedicion_documento' => '2005-05-01',
            'alergias' => 'Polen',
            'sexo' => 'Femenino',
            'genero' => 'Mujer',
            'eps_id' => 2, 
        ]);

        Paciente::create([
            'tipo_documento' => 'Cédula',
            'documento' => '456123789',
            'nombres' => 'Carlos',
            'apellidos' => 'López',
            'fecha_nacimiento' => '2000-07-30',
            'telefono' => '3151234567',
            'email' => 'carlos.lopez@example.com',
            'tipo_sangre' => 'B+',
            'expedicion_documento' => '2020-07-01',
            'alergias' => 'Ninguna',
            'sexo' => 'Masculino',
            'genero' => 'Hombre',
            'eps_id' => 3, 
        ]);
    }
}
