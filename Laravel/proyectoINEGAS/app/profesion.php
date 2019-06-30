<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesion extends Model
{
    //A que tabla hace referencia este modelo
    protected $table = 'profesion';

    //Los campos que son asignables masivamente
    protected $fillable = [
        'nombre'
    ];

    public function persona()
    {
        return $this->belongsToMany('App\persona')->using('App\persona_profesion');
    }
}
