<?php

namespace App\Models;

use App\Models\Municipio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defensor extends Model
{
    use HasFactory;

    protected $table = 'defensor';

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'id_municipio',
        'sexo',
        // ... otras propiedades ...
    ];

    public function municipio()
    {
        // Especifica el nombre de la clave foránea si es diferente de la convención
        return $this->belongsTo(Municipio::class, 'id_municipio'); 
    }
}
