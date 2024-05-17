<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigacionComplementaria extends Model
{
    use HasFactory;

    protected $table = 'investigacion_complementaria';

    protected $fillable = [
        'fecha',
        'hora',
        'activo',
        // ... otras propiedades ...
    ];

}
