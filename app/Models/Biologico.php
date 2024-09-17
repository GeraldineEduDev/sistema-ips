<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biologico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'precio',
        'presentacion', 
        'marca',
        'laboratorio',
        'fecha_expiracion',
        'lote'
    ];

    public function inventarioBiologicos()
    {
        return $this->hasMany(InventarioBiologico::class);
    }

    public function inventarioActual()
    {
        return $this->hasOne(InventarioActual::class);
    }

    public function esquemaVacunacion()
    {
        return $this->hasMany(EsquemaVacunacion::class);
    }

    public function ordenesServicio()
    {
        return $this->hasMany(OrdenServicio::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
