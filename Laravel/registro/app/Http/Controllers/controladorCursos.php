<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorCursos extends Controller
{
    public function cursos(){
        //$listaDeCursos=$this->listaDeCursos();
        $listaDeCursos=DB::table('curso')->get();
        return view('cursos',compact('listaDeCursos'));
    }
    public function listaDeCursos(){
        return DB::table('curso')->get();
    }
    public function cursosDisponibles(){
        return view('cursosDisponibles');
    }
    public function cursosTomados(){
        return view('cursosTomados');
    }
    //DOCENTE
    public function misCursos(){
        return view('misCursos');
    }
}