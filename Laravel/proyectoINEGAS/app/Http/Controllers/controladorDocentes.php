<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorDocentes extends Controller
{
    public function cerrarSesionDocente(){
        return view('cerrarSesionDocente');
    }
}