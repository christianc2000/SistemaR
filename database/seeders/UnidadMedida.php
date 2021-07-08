<?php

namespace Database\Seeders;

use App\Models\UnidadMedida as ModelsUnidadMedida;
use Illuminate\Database\Seeder;

class UnidadMedida extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidad= new ModelsUnidadMedida();
        $unidad->codigo="1";
        $unidad->descripcion="Kilogramo";
        $unidad->abreviatura="kg";
        $unidad->save();

        $unidad2= new ModelsUnidadMedida();
        $unidad2->codigo="2";
        $unidad2->descripcion="arroba";
        $unidad2->abreviatura="@";
        $unidad2->save();

        $unidad3= new ModelsUnidadMedida();
        $unidad3->codigo="3";
        $unidad3->descripcion="libra";
        $unidad3->abreviatura="lb";
        $unidad3->save();

        $unidad4= new ModelsUnidadMedida();
        $unidad4->codigo="4";
        $unidad4->descripcion="gramo";
        $unidad4->abreviatura="g";
        $unidad4->save();

        $unidad5= new ModelsUnidadMedida();
        $unidad5->codigo="5";
        $unidad5->descripcion="litro";
        $unidad5->abreviatura="lt";
        $unidad5->save();

        $unidad6= new ModelsUnidadMedida();
        $unidad6->codigo="6";
        $unidad6->descripcion="unidad";
        $unidad6->abreviatura="u";
        $unidad6->save();

        $unidad7= new ModelsUnidadMedida();
        $unidad7->codigo="7";
        $unidad7->descripcion="docena";
        $unidad7->abreviatura="doc";
        $unidad7->save();

        $unidad8= new ModelsUnidadMedida();
        $unidad8->codigo="8";
        $unidad8->descripcion="fardo";
        $unidad8->abreviatura="f";
        $unidad8->save();

        $unidad9= new ModelsUnidadMedida();
        $unidad9->codigo="9";
        $unidad9->descripcion="monton";
        $unidad9->abreviatura="m";
        $unidad9->save();
    }
}
