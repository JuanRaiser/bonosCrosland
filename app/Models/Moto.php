<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Moto extends Model
{

    use HasFactory, Notifiable;
    protected $table = 'moto'; // Specify the correct table name
    protected $fillable = [
        'nombre',
        'model',
        'precio',
        'bono',
        'precio_base',
    ];
}
