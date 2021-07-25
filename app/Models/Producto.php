<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded=[];//guarda los datos evitando el token

    public function nota_de_compras(){
        return $this->belongsToMany('App\Models\Nota_de_compra')->withPivot('cantidad','precio_total','precio_unitario','descripcion');
    }
}
