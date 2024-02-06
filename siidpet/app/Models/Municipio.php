<?php

namespace App\Models;

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
}
