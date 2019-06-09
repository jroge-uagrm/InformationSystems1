<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocenteTipoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_tipo', function (Blueprint $table) {
            $table->integer('codigoDocente')->unsigned();
            $table->foreign('codigoDocente')->references('codigo')->on('docente');
            $table->integer('idTipo')->unsigned();
            $table->foreign('idTipo')->references('id')->on('tipo');
            $table->primary(array('codigoDocente','idTipo'));
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
        Schema::dropIfExists('docente_tipo');
    }
}
