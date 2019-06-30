<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('codigo');
            $table->integer('ci');
            $table->string('nombre',30);
            $table->string('apellidoPaterno',40);
            $table->string('apellidoMaterno',40);
            $table->integer('telefono')->nullable();
            $table->string('correo',50)->nullable();
            $table->datetime('fechaNacimiento');
            $table->boolean('tipoAlumno');
            $table->boolean('tipoDocente');
            $table->boolean('tipoTrabajador');
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
        Schema::dropIfExists('persona');
    }
}
