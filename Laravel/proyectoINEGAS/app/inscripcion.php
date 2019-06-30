<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    protected $table = 'inscripcion';

    protected $fillable = [
        'fecha','montoTotal','montoFaltante','notaFinal',
        'codigoPersonalAdministrativo','codigoAlumno','idGrupo'
    ];

    public function personalAdministrativo()
    {
        return $this->belongsTo('App\personalAdministrativo','codigoPersonalAdministrativo');
    }

    public function alumno()
    {
        return $this->belongsTo('App\alumno','codigoAlumno');
    }

    public function grupo()
    {
        return $this->belongsTo('App\grupo','idGrupo');
    }

    public function cuota()
    {
        return $this->hasMany('App\cuota','nroInscripcion');
    }
}
