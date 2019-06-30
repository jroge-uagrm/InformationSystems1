<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grupo extends Model
{
    protected $table = 'grupo';

    protected $fillable = [
        'nombre','fechaInicio','fechaFin','cupoDisponible','nroAula',
        'codigoCurso','idHorario','idDias','nroGestion','codigoDocente'
    ];

    public function aula()
    {
        return $this->belongsTo('App\aula','nroAula');
    }

    public function curso()
    {
        return $this->belongsTo('App\curso','codigoCurso');
    }

    public function horario()
    {
        return $this->belongsTo('App\horario','idHorario');
    }

    public function dias()
    {
        return $this->belongsTo('App\dias','idDias');
    }

    public function gestion()
    {
        return $this->belongsTo('App\gestion','nroGestion');
    }

    public function docente()
    {
        return $this->belongsTo('App\docente','codigoDocente');
    }

    public function inscripcion()
    {
        return $this->hasMany('App\inscripcion','idGrupo');
    }
}
