<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio'
    ];

    public function ordenesServicio()
    {
        return $this->hasMany(OrdenServicio::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
