<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estadoCivil extends Model
{
    protected $table = 'estadoCivil';

    protected $fillable = [
        'nombre'
    ];

    public function personalAdministrativo()
    {
        return $this->hasMany('App\personalAdministrativo','idEstadoCivil');
    }
}
