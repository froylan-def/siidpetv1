<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ugi extends Model
{
    use HasFactory;


    protected $table = 'ugi';

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
