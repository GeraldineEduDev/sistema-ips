<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Nombre de la tabla en la base de datos

    // Define los campos que se pueden rellenar masivamente
    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombres',
        'apellidos',
        'razon_social',
        'telefono',
        'email',
        'direccion',
        'tipo_cliente'
    ];
}

