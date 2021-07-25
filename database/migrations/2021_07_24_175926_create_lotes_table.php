<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('vencimiento')->nullable();
            $table->timestamp('elaboracion')->nullable();
            $table->unsignedInteger('cantidad');
            $table->unsignedBigInteger('nota_de_compra_producto_id')->nullable();
            $table->foreign('nota_de_compra_producto_id')->references('id')->on('nota_de_compra_producto')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('lotes');
    }
}
