<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->string('ci_trabajador',10);
            $table->boolean('estado')->nullable();
            $table->unsignedInteger('cod_cargo')->nullable()->unique();
            $table->primary('ci_trabajador');
            $table->foreign('ci_trabajador')->references('ci')->on('personas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('cod_cargo')->references('codigo')->on('cargos')
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
        Schema::dropIfExists('trabajadors');
    }
}
