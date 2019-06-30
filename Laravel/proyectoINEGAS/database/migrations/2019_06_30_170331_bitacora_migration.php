<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BitacoraMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora', function (Blueprint $table){
            $table->increments('nro');
            $table->string('accion',50);
            $table->datetime('fecha');
            $table->string('hora',5);
            $table->string('nombreUsuario',30);
            $table->foreign('nombreUsuario')->references('nombre')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
