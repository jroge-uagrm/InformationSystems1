<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorPersonalAdministrativo extends Controller
{
    public function cerrarSesion(){
        $extend="usuario.usuarioTrabajador";
        return view('cerrarSesion',compact('extend'));
    }
}











