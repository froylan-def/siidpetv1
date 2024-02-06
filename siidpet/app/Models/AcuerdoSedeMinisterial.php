<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcuerdoSedeMinisterial extends Model
{
    use HasFactory;

    protected $table = 'acuerdo_sede_ministerial';

    protected $fillable = [
        'medidas_de_proteccion',
        'fecha_inicio',
        'fecha_fin',
        'id_estatus_sede_ministerial',
        'fecha'
    ];
}
