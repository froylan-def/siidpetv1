<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedidaProteccion extends Model
{
    use HasFactory;

    protected $table = 'medida_proteccion';

    protected $fillable = [
        'nombre',
        'activo',
        // ... otras propiedades ...
    ];
}
