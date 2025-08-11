<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\MedidaProteccion;

class AsignacionMedidas extends Model
{
    use HasFactory;

    protected $table = 'asignacion_medidas';

    protected $fillable = [
        'fecha_inicio',
        'fecha_vencimiento',
        'id_medida_proteccion',
        'observaciones',
        'id_expediente',
        'activo',
        // ... otras propiedades ...
    ];

    public function medida()
    {
        return $this->belongsTo(MedidaProteccion::class, 'id_medida_proteccion'); 
    }

}
