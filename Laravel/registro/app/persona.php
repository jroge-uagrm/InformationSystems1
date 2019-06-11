<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected $table = 'persona';

    protected $fillable = [
        'ci','nombre','apellidoPaterno','apellidoMaterno','telefono','correo',
        'fechaNacimiento','tipoAlumno','tipoDocente','tipoTrabajador'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\usuario','codigoPersona');
    }

    public function profesion()
    {
        return $this->belongsToMany('App\profesion')->using('App\persona_profesion');
    }

    public function nivelDeEstudio()
    {
        return $this->belongsToMany('App\nivelDeEstudio')->using('App\persona_nivelDeEstudio');
    }
}
