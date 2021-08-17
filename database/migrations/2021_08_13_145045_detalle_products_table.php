<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_A_id');
            $table->foreignId('producto_B_id');
            $table->float('cantidad');
            $table->foreign('producto_A_id')->references('id')->on('productos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('producto_B_id')->references('id')->on('productos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_productos');
    }
}
