<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

    use HasFactory;
    protected $guarded=[];  // por que pone esto
    protected $primaryKey = 'codigo';//dice que ahora codigo sera la llave primaria
    public $incrementing = false;

    public function encargados(){
        return $this->hasMany(Encargado::class,'cod_prov','codigo');
    }
}
