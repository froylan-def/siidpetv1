<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P_Delito extends Model
{
    use HasFactory;


    protected $table = 'p_delito';

    protected $fillable = [
        'nombre',
        'activo',
        // ... otras propiedades ...
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    /*protected $attributes = [
        'options' => '[]',
        'delayed' => false,
    ]; */


}
