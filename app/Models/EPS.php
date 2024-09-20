<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPS extends Model
{
    use HasFactory;

    protected $table = 'eps';

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'tipo'
    ];
}
