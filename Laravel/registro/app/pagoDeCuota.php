<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagoDeCuota extends Model
{
    protected $table = 'pagoDeCuota';

    protected $fillable = [
        'nroInscripcion','nroCuota','nro','fecha','monto'
    ];

    public function cuota()
    {
        return $this->belongsTo('App\cuota',array('nroInscripcion','nroCuota'));
    }
}
