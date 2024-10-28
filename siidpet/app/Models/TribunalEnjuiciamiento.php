<?php

namespace App\Models;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TribunalEnjuiciamiento extends Model
{
    use HasFactory;

    protected $table = 'tribunal_enjuiciamiento';

    protected $fillable = [
        'nombre',
        'id_municipio',
        'activo',
        // ... otras propiedades ...
    ];


    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio'); 
    }


}
