<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function nota_de_compra_productos(){
        return $this->belongsTo('App\Models\Nota_de_compra_producto');
    }
}
