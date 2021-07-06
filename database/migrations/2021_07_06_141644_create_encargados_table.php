<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncargadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargados', function (Blueprint $table) {
            $table->string('ci_e',10);
            $table->unsignedInteger('cod_prov');
            $table->primary('ci_e');
            $table->foreign('ci_e')->references('ci')->on('personas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('cod_prov')->references('codigo')->on('proveedors')
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
        Schema::dropIfExists('encargados');
    }
}
