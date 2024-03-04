<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expediente';

    protected $fillable = [
        "foja",
        "id_ugi",
        "id_defensor",
        "id_entrevista",
        "nuc",
        "id_imputado",
        "id_delito",
        "id_victima",
        "id_flagrancia",
        "determinacion_mp",
        "id_asignacion_medidas",
        "id_acuerdo_sede_ministerial",
        "carpeta_procesal",
        "audiencia_inicial",
        "id_juez_control",
        "id_defensor_audiencia",
        "cita_mecanismos",
        "id_acuerdo_reparatorio",
        "fecha_formulacion_imputacion",
        "fecha_vinculacion_proceso",
        "id_delito_proceso",
        "id_investigacion_complementaria",
        "id_prorroga_plazo",
        "id_medida_cautelar",
        "audiencia_intermedia",
        "id_suspencion_condicional_proceso",
        "id_procedimiento_abreviado",
        "juicio",
        "id_tribunal_enjuiciamiento",
        "sentencia_juicio",
        "id_conclusion",
        "visita_carcelaria",
        "id_impugnacion",
        "id_orden_aprencion",
        // ... otras propiedades ...
    ];
    
}
