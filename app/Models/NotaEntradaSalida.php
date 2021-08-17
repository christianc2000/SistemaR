<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaEntradaSalida extends Model
{
    use HasFactory;

    public function detalleNotas(){
            return $this->hasMany(DetalleNotaEntradaSalida::class,'nota_id');
    } 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    } 
}
