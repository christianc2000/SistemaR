<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proveedor;
use App\Models\Persona;
use App\Models\Nota_de_compra;

class Encargado extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'ci_e';
    public $incrementing = false;
    protected $keyType = 'string';

    public function nota_de_compras(){
        return $this->hasMany(Nota_de_compra::class,'ci_en','ci_e');
    }
    public function personas(){
      return $this->belongsTo(Persona::class,'ci_e','ci');
    }
    public function proveedors(){
        return $this->belongsTo(Proveedor::class,'cod_prov','codigo');
    }
}
