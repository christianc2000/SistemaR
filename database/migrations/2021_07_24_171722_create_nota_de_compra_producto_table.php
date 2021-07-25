<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaDeCompraProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_de_compra_producto', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('cantidad');
            $table->decimal('precio_total',8,2);
            $table->decimal('precio_unitario',8,2);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('nota_de_compra_id');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('nota_de_compra_id')->references('id')->on('nota_de_compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_de_compra_producto');
    }
}
