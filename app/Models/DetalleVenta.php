<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    //relacion uno a muchos (inversa)
    public function venta()
    {
        return $this->belongsTo('App\Models\Venta');
    }
    //relacion uno a muchos (inversa)
    public function productos()
    {
        return $this->belongsTo('App\Models\Producto');
    }
}
