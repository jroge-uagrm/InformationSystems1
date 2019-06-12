<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlador extends Controller
{
    public function index(){}
    public function create(){}
    public function store(Request $request){}
    public function show($id){}
    public function edit($id){}
    public function update(Request $request, $id){}
    public function destroy($id){}
    //---------------------Personal------------------------
    
    //VISTAS
    public function inicio(){return view('inicio');}
    public function informacion(){return view('informacion');}
    public function iniciarSesion(){return view('iniciarSesion');}    
    public function contactanos(){return view('contactanos');}
    public function cursosDisponibles(){return view('cursosDisponibles');}
    public function cursosTomados(){return view('cursosTomados');}

    //VISTAS CON PARAMETROS
    public function cursos(){
        //$listaDeCursos=$this->listaDeCursos();
        $listaDeCursos=([
            "Curso 1",
            "Curso 2",
        ]);
        return view('cursos',compact('listaDeCursos'));
    }

    //CONSULTAS
    private function listaDeCursos(){
        return DB::table('curso')->get();
    }

    //VERIFICACIONES
    public function verificarInicioDeSesion(Request $request){
        $this->validate($request,[
            'nombreUsuario'=>'required|max:30',
            'contrasenhaUsuario'=>'required|max:30',
        ]);
        //return $request->all();
        return view('usuario',$request->all());
    }
    
    //-----------------------OTROS------------------------
    public function registrados(){
        $nombre='Jroge';
        $apellidos='Torrez';
        $correo='jroge@gmail.com';
        return view('registrados')->with([
            'nombreVista'=>$nombre,
            'apellidosVista'=>$apellidos,
            'correoVista'=>$correo
        ]);
    }
    public function parametroEjemplo($p){
        return view('ejemplo',compact('p'));
    }
}
