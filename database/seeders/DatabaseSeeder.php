<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Crear roles
        $this->call(RolesTableSeeder::class);

        // Crear tipos de servicio
        $this->call(TiposServicioSeeder::class);

        // Crear estados de factura
        $this->call(EstadosFacturaSeeder::class);

        // Crear registros en Clientes
        $this->call(ClientesSeeder::class);

        // Verificar si el usuario ya existe antes de crearlo
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
    }
}
