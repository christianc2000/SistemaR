<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    //relacion uno a muchos con detalleVenta para relacionarse con producto
   public function detalle_ventas()
    {
        return $this->hasMany('App\Models\DetalleVenta');
    }
    //relacion uno a muchos inversa con user
   public function user()
    {
        return $this->belongsTo('App\Models\User');
    } 
}
