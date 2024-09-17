<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioActual extends Model
{
    use HasFactory;

    protected $fillable = [
        'biologico_id',
        'cantidad_disponible'
    ];

    public function biologico()
    {
        return $this->belongsTo(Biologico::class);
    }
}
