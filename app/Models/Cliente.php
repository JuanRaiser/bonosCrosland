<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';      // <- importante si tu tabla es singular
    protected $primaryKey = 'id_cliente';
    public $timestamps = true;         // o false si NO tienes created_at/updated_at

    protected $fillable = [
        'dni', 'nombre', 'apellidos',
    ];
    public function voucher()
{
    return $this->hasOne(Voucher::class, 'id_cliente');
}

}

