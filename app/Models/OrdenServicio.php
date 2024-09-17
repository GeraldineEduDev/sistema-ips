<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'biologico_id',
        'muestra_id',
        'fecha',
        'estado',
        'observaciones'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function biologico()
    {
        return $this->belongsTo(Biologico::class);
    }

    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }
}
