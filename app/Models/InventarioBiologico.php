<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioBiologico extends Model
{
    use HasFactory;

    protected $fillable = [
        'biologico_id',
        'cantidad',
        'fecha_ingreso'
    ];

    public function biologico()
    {
        return $this->belongsTo(Biologico::class);
    }
}
