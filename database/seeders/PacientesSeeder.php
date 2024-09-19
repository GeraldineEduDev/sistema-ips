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
            'tipo_documento' => 'Cédula de Ciudadanía',
            'documento' => '1234567890',
            'nombres' => 'Carlos',
            'apellidos' => 'González',
            'fecha_nacimiento' => '1985-05-15',
            'telefono' => '3001234567',
            'email' => 'carlos.gonzalez@example.com',
            'tipo_sangre' => 'O+',
            'expedicion_documento' => '2005-01-01',
            'alergias' => 'Ninguna',
            'sexo' => 'Masculino',
            'genero' => 'Hombre',
            'eps_id' => 1,
        ]);

        Paciente::create([
            'tipo_documento' => 'Cédula de Extranjería',
            'documento' => '9876543210',
            'nombres' => 'Ana',
            'apellidos' => 'Martínez',
            'fecha_nacimiento' => '1990-10-20',
            'telefono' => '3059876543',
            'email' => 'ana.martinez@example.com',
            'tipo_sangre' => 'A+',
            'expedicion_documento' => '2010-02-15',
            'alergias' => 'Pólvora',
            'sexo' => 'Femenino',
            'genero' => 'Mujer',
            'eps_id' => 2,
        ]);

        Paciente::create([
            'tipo_documento' => 'Cédula de Ciudadanía',
            'documento' => '2345678901',
            'nombres' => 'Luis',
            'apellidos' => 'Ramírez',
            'fecha_nacimiento' => '1978-03-10',
            'telefono' => '3012345678',
            'email' => 'luis.ramirez@example.com',
            'tipo_sangre' => 'B+',
            'expedicion_documento' => '1998-06-01',
            'alergias' => 'Ninguna',
            'sexo' => 'Masculino',
            'genero' => 'Hombre',
            'eps_id' => 1,
        ]);
    }
}
