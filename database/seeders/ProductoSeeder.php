<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto= new Producto();
        $producto->nombre="coca cola familiar";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="1/4 de pollo";
        $producto->tipo_menu=1;
        $producto->tipo_char="P";
        $producto->precio="10";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="pierna";
        $producto->tipo_menu=1;
        $producto->tipo_char="L";
        $producto->precio="0";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="pecho";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="ala";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="contra";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="pierna contra";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="ala pecho";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

        $producto= new Producto();
        $producto->nombre="coca cola familiar";
        $producto->tipo_menu=1;
        $producto->tipo_compra=1;
        $producto->tipo_char="B";
        $producto->precio="15";
        $producto->save();

 
    }
}
