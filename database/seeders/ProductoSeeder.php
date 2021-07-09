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
    }
}
