<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaDeComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_de_compras', function (Blueprint $table) {
            $table->id();
            $table->decimal('total',8,2);
            $table->string('ci_en',10)->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreign('ci_en')->references('ci_e')->on('encargados')->onDelete('set null');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('nota_de_compras');
    }
}
