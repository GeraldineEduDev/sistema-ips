<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

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

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
