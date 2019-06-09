<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PagoDeCuotaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagoDeCuota', function (Blueprint $table) {
            $table->integer('nroInscripcion')->unsigned();
            $table->integer('nroCuota')->unsigned();
            $table->integer('nro')->unsigned();
            $table->primary(array('nroInscripcion','nroCuota','nro'));
            $table->foreign(array('nroInscripcion','nroCuota'))->references(array('nroInscripcion','nro'))->on('cuota');
            $table->datetime('fecha');
            $table->float('monto');
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
        Schema::dropIfExists('pagoDeCuota');
    }
}
