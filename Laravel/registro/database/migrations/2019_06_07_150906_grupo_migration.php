<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GrupoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->datetime('fechaInicio');
            $table->datetime('fechaFin');
            $table->integer('cupoDisponible');
            $table->integer('nroAula')->unsigned();
            $table->foreign('nroAula')->references('nro')->on('aula');
            $table->integer('codigoCurso')->unsigned();
            $table->foreign('codigoCurso')->references('codigo')->on('curso');
            $table->integer('idHorario')->unsigned();
            $table->foreign('idHorario')->references('id')->on('horario');
            $table->integer('idDias')->unsigned();
            $table->foreign('idDias')->references('id')->on('dias');
            $table->integer('nroGestion')->unsigned();
            $table->foreign('nroGestion')->references('nro')->on('gestion');
            $table->integer('codigoDocente')->unsigned();
            $table->foreign('codigoDocente')->references('codigo')->on('docente');
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
        Schema::dropIfExists('grupo');
    }
}
