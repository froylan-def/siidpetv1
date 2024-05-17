<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imputado extends Model
{
    use HasFactory;

    protected $table = 'imputado';

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
        'fecha_de_nacimiento',
        'id_escolaridad',
        'id_ocupacion',
        'activo',
    ];
}
