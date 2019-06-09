<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CuotaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuota', function (Blueprint $table) {
            $table->integer('nroInscripcion')->unsigned();
            $table->integer('nro')->unsigned();
            $table->primary(array('nroInscripcion','nro'));
            $table->foreign('nroInscripcion')->references('nro')->on('inscripcion');
            $table->float('montoTotal');
            $table->float('montoFaltante');
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
        Schema::dropIfExists('cuota');
    }
}
