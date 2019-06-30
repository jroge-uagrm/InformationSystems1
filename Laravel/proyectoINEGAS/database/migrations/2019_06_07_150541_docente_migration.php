<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocenteMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente', function (Blueprint $table) {
            $table->increments('codigo');
            $table->integer('codigoPersona')->unsigned();
            $table->foreign('codigoPersona')->references('codigo')->on('persona');
            $table->string('lugarDeTrabajo',30)->nullable();
            $table->string('direccionDeTrabajo',30)->nullable();
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
        Schema::dropIfExists('docente');
    }
}
