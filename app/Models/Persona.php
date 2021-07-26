<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Celular_persona;
use App\Models\Encargado;
class Persona extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'ci';
    public $incrementing = false;
    protected $keyType = 'string';
//relación de uno a muchos
    public function celular_personas(){
        return $this->hasMany(Celular_persona::class,'ci_p','ci');
    }
    //relación de uno a uno
    public function encargados(){
        return $this->hasOne(Encargado::class,'ci_e','ci');
    }


}
