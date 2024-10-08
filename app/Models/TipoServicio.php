<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    use HasFactory;

    protected $table = 'tipos_servicio';

    protected $fillable = ['nombre'];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
