<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombres' => 'Andrés',
            'apellidos' => 'Martínez',
            'tipo_documento' => 'Cédula',
            'documento' => '111111111',
            'email' => 'andres.martinez@example.com',
            'password' => Hash::make('password123'),
            'rol_id' => 1,
            'estado' => true,
        ]);

        Usuario::create([
            'nombres' => 'Laura',
            'apellidos' => 'Gómez',
            'tipo_documento' => 'Cédula',
            'documento' => '222222222',
            'email' => 'laura.gomez@example.com',
            'password' => Hash::make('password123'),
            'rol_id' => 2,
            'estado' => true,
        ]);

        Usuario::create([
            'nombres' => 'Jorge',
            'apellidos' => 'Ramírez',
            'tipo_documento' => 'Cédula',
            'documento' => '333333333',
            'email' => 'jorge.ramirez@example.com',
            'password' => Hash::make('password123'),
            'rol_id' => 3,
            'estado' => true,
        ]);

        Usuario::create([
            'nombres' => 'Sofía',
            'apellidos' => 'Hernández',
            'tipo_documento' => 'Cédula',
            'documento' => '444444444',
            'email' => 'sofia.hernandez@example.com',
            'password' => Hash::make('password123'),
            'rol_id' => 4,
            'estado' => true,
        ]);
    }
}
