<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonaNivelDeEstudioMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_nivelDeEstudio', function (Blueprint $table) {
            $table->integer('codigoPersona')->unsigned();
            $table->foreign('codigoPersona')->references('codigo')->on('persona');
            $table->integer('idNivelDeEstudio')->unsigned();
            $table->foreign('idNivelDeEstudio')->references('id')->on('nivelDeEstudio');
            $table->primary(array('codigoPersona','idNivelDeEstudio'));
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
        Schema::dropIfExists('persona_nivelDeEstudio');
    }
}
