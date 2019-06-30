<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table = 'departamento';

    protected $fillable = [
        'nombre','cantidadCargos'
    ];

    public function cargo()
    {
        return $this->hasMany('App\cargo','idDepartamento');
    }
}
