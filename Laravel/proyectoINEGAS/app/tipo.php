<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $table = 'tipo';

    protected $fillable = [
        'nombre'
    ];

    public function curso()
    {
        return $this->hasMany('App\curso','idTipo');
    }

    public function docente()
    {
        return $this->belongsToMany('App\docente')->using('App\docente_tipo');
    }
}
