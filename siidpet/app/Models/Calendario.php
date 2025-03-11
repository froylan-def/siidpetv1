<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Defensor;

class Calendario extends Model
{
    use HasFactory;

    protected $table = 'calendario';

    protected $fillable = [
        "id",
        "evento",
        "descripcion",
        "fecha_inicio",
        "fecha_fin",
        "id_defensor",
    ];


    public function defensor()
    {
        return $this->belongsTo(Defensor::class, 'id_defensor'); 
    }


}
