<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id();//codigo
            $table->unsignedInteger('codigo');
            $table->string('nombre', 30);
            $table->boolean('tipo_menu')->nullable();
            $table->boolean('tipo_compra')->nullable();
            $table->string('tipo char', 1);
            //$table->string('slug')->unique;
            $table->decimal('precio',8,2);//->nullable();
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
        Schema::dropIfExists('platos');
    }
}
