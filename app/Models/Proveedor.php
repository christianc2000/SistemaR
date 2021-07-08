<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $primaryKey = 'codigo';//dice que ahora codigo sera la llave primaria
    use HasFactory;
    protected $guarded=[];  // por que pone esto
}
