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
    public function miHorarioAlumno(){return view('miHorarioAlumno');}
    public function pagos(){return view('pagos');}
    public function cerrarSesionAlumno(){return view('cerrarSesionAlumno');}
    
    public function misCursos(){return view('misCursos');}
    public function listasDeAlumnos(){return view('listasDeAlumnos');}
    public function miHorarioDocente(){return view('miHorarioDocente');}
    public function otros(){return view('otros');}
    public function cerrarSesionDocente(){return view('cerrarSesionDocente');}
    
    public function cerrarSesionTrabajador(){return view('cerrarSesionTrabajador');}

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
        if($request->tipoPersona=='A'){
            return view('usuarioAlumno',$request->all());
        }elseif ($request->tipoPersona=='D'){
            return view('usuarioDocente');
        }else{
            return view('usuarioTrabajador');
        }
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
