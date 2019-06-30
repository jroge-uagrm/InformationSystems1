<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aula extends Model
{
    protected $table = 'aula';

    protected $fillable = [
        'ubicacion','capacidad'
    ];

    public function grupo()
    {
        return $this->hasMany('App\grupo','nroAula');
    }
}
