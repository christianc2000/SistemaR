<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleExistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_existencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id');
            $table->foreignId('existencia_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('existencia_id')->references('id')->on('existencias')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('cantidad');
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
        Schema::dropIfExists('detalle_existencias');
    }
}
