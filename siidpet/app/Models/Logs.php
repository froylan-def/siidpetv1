<?php

namespace App\Models;

use App\Models\Defensor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $fillable = [
        'id_defensor',
        'accion',
        'descripcion',
        'id_registro',
        'tipo_registro'
    ];

    public function defensor()
    {
        return $this->belongsTo(Defensor::class, 'id_defensor');
    }

}
