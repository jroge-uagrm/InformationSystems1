<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonaProfesionMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_profesion', function (Blueprint $table) {
            $table->integer('codigoPersona')->unsigned();
            $table->foreign('codigoPersona')->references('codigo')->on('persona');
            $table->integer('idProfesion')->unsigned();
            $table->foreign('idProfesion')->references('id')->on('profesion');
            $table->primary(array('codigoPersona','idProfesion'));
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
        Schema::dropIfExists('persona_profesion');
    }
}
