<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorCursos extends Controller
{
    public static function cursos(){
        return $cursos=DB::table('curso')
                ->join('tipo', 'curso.idTipo', '=', 'tipo.id')
                ->select('curso.*', 'tipo.nombre as nombreTipo')
                ->get();
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