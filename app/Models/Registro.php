<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registro'; // Specify the correct table name
    protected $fillable = [
        'id_cliente',
        'nombre',
        'apellidos',
        'cupon',
        'id_moto',
    ];
}
