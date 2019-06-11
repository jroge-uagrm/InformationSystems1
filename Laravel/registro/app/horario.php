<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class horario extends Model
{
    protected $table = 'horario';

    protected $fillable = [
        'horaInicio','horaFin'
    ];

    public function grupo()
    {
        return $this->hasMany('App\grupo','idHorario');
    }
}
