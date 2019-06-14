<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    protected $table = 'docente';

    protected $fillable = [
        'codigoPersona','lugarDeTrabajo','direccionDeTrabajo'
    ];

    public function persona()
    {
        return $this->hasOne('App\persona','codigoPersona');
    }

    public function grupo()
    {
        return $this->hasMany('App\grupo','codigoDocente');
    }

    public function tipo()
    {
        return $this->belongsToMany('App\tipo')->using('App\docente_tipo');
    }
}
