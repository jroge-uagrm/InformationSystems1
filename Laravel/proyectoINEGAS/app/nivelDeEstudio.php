<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nivelDeEstudio extends Model
{
    protected $table = 'nivelDeEstudio';

    protected $fillable = [
        'nombre'
    ];
    
    public function persona()
    {
        return $this->belongsToMany('App\persona')->using('App\persona_nivelDeEstudio');
    }
}
