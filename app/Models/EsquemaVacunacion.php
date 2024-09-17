<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsquemaVacunacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'biologico_id',
        'dosis',
        'fecha_aplicacion'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function biologico()
    {
        return $this->belongsTo(Biologico::class);
    }
}
