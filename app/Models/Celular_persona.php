<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celular_persona extends Model
{
    use HasFactory;

    protected $guarded=[];

    //relación de uno a muchos(inversa)
    public function personas(){
        return $this->belongsTo('App\Models\Persona','ci_p','ci');
    }


}
