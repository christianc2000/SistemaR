<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota_de_compra extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsTo('App\Models\User','id_usuario');
    }
    public function encargados(){
        return $this->belongsTo('App\Models\Encargado','ci_en','ci_e');
    }
    public function productos(){
        return $this->belongsToMany('App\Models\Producto')->withPivot('cantidad','precio_total','precio_unitario','descripcion');
    }

}
