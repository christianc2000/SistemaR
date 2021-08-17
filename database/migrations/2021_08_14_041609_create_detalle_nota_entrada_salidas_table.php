<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleNotaEntradaSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_nota_entrada_salidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nota_id');
            $table->foreignId('producto_id');
            $table->unsignedInteger('cantidad');
            $table->text('Descripcion')->nullable();
            $table->foreign('nota_id')->references('id')->on('nota_entrada_salidas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_nota_entrada_salidas');
    }
}
