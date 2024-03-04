<?php

namespace App\Models;

use App\Models\Defensor;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'p_municipio';

    protected $fillable = [
        'nombre',
        'id_estado',
        // ... otras propiedades ...
    ];

    public function defensores()
    {
        // Especifica el nombre de la clave foránea si es diferente de la convención
        return $this->hasMany(Defensor::class, 'id_municipio'); 
    }


}
