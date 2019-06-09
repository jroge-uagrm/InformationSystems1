<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CursoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('nombre',30);
            $table->float('duracion');
            $table->float('costo');
            $table->integer('cupoTotal');
            $table->integer('cupoDisponible');
            $table->integer('idTipo')->unsigned();
            $table->foreign('idTipo')->references('id')->on('tipo');
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
        Schema::dropIfExists('curso');
    }
}
