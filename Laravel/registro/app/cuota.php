<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuota extends Model
{
    protected $table = 'cuota';

    protected $fillable = [
        'nroInscripcion','nro','montoTotal','montoFaltante'
    ];

    public function inscripcion()
    {
        return $this->belongsTo('App\inscripcion','nroInscripcion');
    }

    public function pagoDeCuota()
    {
        return $this->hasMany('App\pagoDeCuota',array('nroInscripcion','nroCuota'));
    }
}
