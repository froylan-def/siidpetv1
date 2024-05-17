<?php

namespace App\Models;

use App\Models\Municipio;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defensor extends Model
{
    use HasFactory;

    protected $table = 'defensor';

    protected $fillable = [
        'id_usuario',
        'id_municipio',
        'sexo',
        'activo',
    ];

    public function municipio()
    {
        // Especifica el nombre de la clave foránea si es diferente de la convención
        return $this->belongsTo(Municipio::class, 'id_municipio'); 
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

}
