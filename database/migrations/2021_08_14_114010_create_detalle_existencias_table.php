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
            
            $table->unsignedInteger('cant');
            $table->foreignId('producto_id')->nullable();
            $table->foreignId('existencia_id')->nullable();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');
            $table->foreign('existencia_id')->references('id')->on('existencias')->onDelete('set null');
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
