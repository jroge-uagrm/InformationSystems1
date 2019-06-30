<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    protected $table = 'cargo';

    protected $fillable = [
        'nombre','estado','idDepartamento'
    ];

    public function departamento()
    {
        return $this->belongsTo('App\departamento','idDepartamento');
    }

    public function personalAdministrativo()
    {
        return $this->hasMany('App\personalAdministrativo','idCargo');
    }
}
