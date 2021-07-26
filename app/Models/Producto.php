<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded=[];//guarda los datos evitando el token

    //relacion uno a muchos con detalleventa
    public function detalle_ventas()
    {
        return $this->hasMany('App\Models\DetalleVenta');
    } 
}
