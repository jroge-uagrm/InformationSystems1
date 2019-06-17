<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorAlumnos extends Controller
{
    public function cerrarSesionAlumno(){
        return view('cerrarSesionAlumno');
    }
    //DOCENTE
    public function listasDeAlumnos(){
        return view('listasDeAlumnos');
    }
}