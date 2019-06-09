<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonalAdministrativoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalAdministrativo', function (Blueprint $table) {
            $table->increments('codigo');
            $table->integer('codigoPersona')->unsigned();
            $table->foreign('codigoPersona')->references('codigo')->on('persona');
            $table->integer('cantidadDeHijos')->nullable();
            $table->string('direccionDomicilio',50)->nullable();
            $table->datetime('fechaDeIngreso');
            $table->integer('idCargo')->unsigned();
            $table->foreign('idCargo')->references('id')->on('cargo');
            $table->integer('idEstadoCivil')->unsigned();
            $table->foreign('idEstadoCivil')->references('id')->on('estadoCivil');
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
        Schema::dropIfExists('personalAdministrativo');
    }
}
