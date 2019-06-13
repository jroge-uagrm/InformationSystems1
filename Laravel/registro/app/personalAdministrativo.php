<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalAdministrativo extends Model
{
    protected $table = 'personalAdministrativo';

    protected $fillable = [
        'codigoPersona','cantidadDeHijos','direccionDomicilio','fechaDeIngreso',
        'idCargo','idEstadoCivil'
    ];

    public function persona()
    {
        return $this->hasOne('App\persona','codigoPersona');
    }

    public function cargo()
    {
        return $this->belongsTo('App\cargo','idCargo');
    }

    public function estadoCivil()
    {
        return $this->belongsTo('App\estadoCivil','idEstadoCivil');
    }

    public function inscripcion()
    {
        return $this->hasMany('App\inscripcion','codigoPersonalAdministrativo');
    }
}
