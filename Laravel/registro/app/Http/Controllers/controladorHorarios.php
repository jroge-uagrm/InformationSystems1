<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorHorarios extends Controller
{
    public function miHorarioAlumno(){
        return view('miHorarioAlumno');
    }
    //DOCENTE
    public function miHorarioDocente(){
        return view('miHorarioDocente');
    }
}