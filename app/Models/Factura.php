<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_servicio_id',
        'fecha_facturacion',
        'estado_id', 
        'paciente_id',
        'cliente_id',
        'total',
        'total_cantidad', 
        'tipo_item',
        'biologico_id',
        'muestra_id',
        'cantidad', 
        'precio_unitario',
        'subtotal'
    ];

    protected $casts = [
        'fecha_facturacion' => 'datetime',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tipoServicio()
    {
        return $this->belongsTo(TipoServicio::class, 'tipo_servicio_id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoFactura::class, 'estado_id');
    }

    public function biologico()
    {
        return $this->belongsTo(Biologico::class, 'biologico_id');
    }

    public function muestra()
    {
        return $this->belongsTo(Muestra::class, 'muestra_id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleFactura::class);
    }
}
