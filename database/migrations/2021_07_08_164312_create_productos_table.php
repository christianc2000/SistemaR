<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();//codigo
            $table->string('nombre', 30);
            $table->boolean('tipo_menu')->nullable();
            $table->boolean('tipo_compra')->nullable();
            $table->string('tipo_char', 1)->nullable();
            //$table->string('slug')->unique;
            $table->decimal('precio',8,2)->nullable();//->nullable();
            $table->unsignedInteger('codigo');
            $table->foreign('codigo')->references('codigo')->on('unidad_medidas')
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
        Schema::dropIfExists('productos');
    }
}
