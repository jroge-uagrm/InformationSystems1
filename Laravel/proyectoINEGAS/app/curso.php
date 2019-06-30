<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = 'curso';

    protected $fillable = [
        'nombre','duracion','costo','cupoTotal','idTipo'
    ];

    public function tipo()
    {
        return $this->belongsTo('App\tipo','idTipo');
    }

    public function grupo()
    {
        return $this->hasMany('App\grupo','codigoCurso');
    }
}