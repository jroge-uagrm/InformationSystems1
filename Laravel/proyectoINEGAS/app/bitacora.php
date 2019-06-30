<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    protected $table = 'bitacora';

    protected $fillable = [
        'nro','accion','fecha','hora','nombreUsuario'
    ];

    public function usuario()
    {
        return $this->hasOne('App\usuario','nombreUsuario');
    }
}
