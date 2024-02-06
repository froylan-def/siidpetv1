<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victima extends Model
{
    use HasFactory;

    protected $table = 'victima';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'domicilio',
        'sexo',
        'id_pais',
        'id_estado',
        'id_municipio',
        'estado_civil',
        'fecha_nacimiento',
        'id_ocupacion',
        'created_at',
        'updated_at',


        // ... otras propiedades ...
    ];
}
