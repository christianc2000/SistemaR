<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('cantidad');
            $table->decimal('costo_prod',8,2);
            $table->unsignedBigInteger('venta_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();

            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('set null');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null');

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
        Schema::dropIfExists('detalle_ventas');
    }
}
