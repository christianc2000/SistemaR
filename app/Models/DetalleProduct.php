<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleProduct extends Model
{
    use HasFactory; 
    protected $guarded=[];  
    protected $table='detalle_products';

    public function productos(){
        return $this->belongsTo(Producto::class);
    }

    public static function noExiste($producto_A,$producto_B){

        $aux= DetalleProduct::where('producto_A_id',$producto_A)
                ->where('producto_B_id',$producto_B)->first();
        return $aux == null ;
    }
}