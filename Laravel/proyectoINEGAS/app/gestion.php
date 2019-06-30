<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gestion extends Model
{
    protected $table = 'gestion';

    protected $fillable = [
        'nombre'
    ];

    public function grupo()
    {
        return $this->hasMany('App\grupo','nroGestion');
    }
}
