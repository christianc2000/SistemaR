<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded=[];//guarda los datos evitando el token

    function productos(){

            return $this->belongsToMany(Producto::class, 'detalle_productos', 'producto_A_id', 'producto_B_id')
            ->as('detalle_producto')->withPivot('cantidad')->withTimesTamps();
    }
}
