<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelitoProceso extends Model
{
    use HasFactory;

    protected $table = 'delito_proceso';

    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'resultado',
        'observaciones',
        'activo',

      
    ];
}
  // ... otras propiedades ...