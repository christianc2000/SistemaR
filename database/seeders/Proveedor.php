<?php

namespace Database\Seeders;

use App\Models\Proveedor as ModelsProveedor;
use Illuminate\Database\Seeder;

class Proveedor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proveedor= new ModelsProveedor();
        $proveedor->codigo="1";
        $proveedor->nombre_negocio="polleria san juan";
        $proveedor->direccion="'av. plan 3 mil";
        $proveedor->save();

        $proveedor2= new ModelsProveedor();
        $proveedor2->codigo="2";
        $proveedor2->nombre_negocio="coca cola";
        $proveedor2->direccion="Calle Israel mendia #4";
        $proveedor2->save();

        $proveedor3= new ModelsProveedor();
        $proveedor3->codigo="3";
        $proveedor3->nombre_negocio="distr. vasquez";
        $proveedor3->direccion="calle israel mendia #9";
        $proveedor3->save();

        $proveedor4= new ModelsProveedor();
        $proveedor4->codigo="4";
        $proveedor4->nombre_negocio="verduleria buenas";
        $proveedor4->direccion="calle israel mendia #8";
        $proveedor4->save();
    }
}
