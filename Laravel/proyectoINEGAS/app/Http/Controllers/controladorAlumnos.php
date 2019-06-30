<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorAlumnos extends Controller
{
    public function cerrarSesionAlumno(){
        $tipo="Alumno";
        return view('cerrarSesion',compact('tipo'));
    }
    //DOCENTE
    public function listasDeAlumnos(){
        return view('listasDeAlumnos');
    }
}