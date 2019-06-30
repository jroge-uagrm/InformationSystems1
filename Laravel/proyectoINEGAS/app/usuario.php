<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $table = 'usuario';

    protected $fillable = [
        'nombre','contraseña','privilegio','codigoPersona'
    ];

    public function persona()
    {
        return $this->hasOne('App\persona','codigoPersona');
    }

    public function bitacora()
    {
        return $this->belongsTo('App\bitacora','nombreUsuario');
    }
}
