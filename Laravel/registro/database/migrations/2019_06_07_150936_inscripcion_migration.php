<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InscripcionMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->increments('nro');
            $table->datetime('fecha');
            $table->float('montoTotal');
            $table->float('montoFaltante');
            $table->integer('notaFinal');
            $table->integer('codigoPersonalAdministrativo')->unsigned();
            $table->foreign('codigoPersonalAdministrativo')->references('codigo')->on('personalAdministrativo');
            $table->integer('codigoAlumno')->unsigned();
            $table->foreign('codigoAlumno')->references('codigo')->on('alumno');
            $table->integer('idGrupo')->unsigned();
            $table->foreign('idGrupo')->references('id')->on('grupo');
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
        Schema::dropIfExists('inscripcion');
    }
}
