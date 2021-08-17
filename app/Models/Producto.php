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
    
    function nota_de_compras(){
        return $this->belongsToMany('App\Models\Nota_de_compra')->withPivot('cantidad','precio_total','precio_unitario','descripcion');
    }
    //relacion uno a muchos con detalleventa
    public function detalle_ventas()
    {
        return $this->hasMany('App\Models\DetalleVenta');
    } 

    public static function detalles($productoAId){
        return DetalleProduct::where('producto_A_id',$productoAId)->get();
       
    }
}
