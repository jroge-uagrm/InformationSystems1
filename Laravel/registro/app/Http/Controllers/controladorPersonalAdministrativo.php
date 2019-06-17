<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorPersonalAdministrativo extends Controller
{
    public function cerrarSesionTrabajador(){
        return view('cerrarSesionTrabajador');
    }
    public function registrarPersona(){
        return view('registrarPersona');
    }
}