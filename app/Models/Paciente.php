<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'telefono',
        'email',
        'tipo_sangre',
        'expedicion_documento',
        'alergias',
        'sexo',
        'genero',
        'eps_id'
    ];

    public function eps()
    {
        return $this->belongsTo(Eps::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function esquemaVacunacion()
    {
        return $this->hasMany(EsquemaVacunacion::class);
    }

    public function ordenesServicio()
    {
        return $this->hasMany(OrdenServicio::class);
    }
}
