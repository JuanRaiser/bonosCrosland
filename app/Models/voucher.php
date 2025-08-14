<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class voucher extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'voucher'; // Specify the correct table name

    protected $primaryKey = 'id_voucher';
    protected $fillable = [
        'id_cliente',
        'id_moto',
        'precio_final',
    ];
}
