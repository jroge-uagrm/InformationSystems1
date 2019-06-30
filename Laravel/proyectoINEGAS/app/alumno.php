<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    protected $table = 'alumno';

    protected $fillable = [
        'codigoPersona','universidad'
    ];

    public function persona()
    {
        return $this->hasOne('App\persona','codigoPersona');
    }

    public function inscripcion()
    {
        return $this->hasMany('App\inscripcion','codigoAlumno');
    }
}
