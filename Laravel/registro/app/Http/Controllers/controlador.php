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
    //Personal
    public function logIn(){
        return view('logIn');
    }
    public function cursos(){return view('cursos');}
    public function informacion(){return view('informacion');}
    public function iniciarSesion(){return view('iniciarSesion');}    
    public function contactanos(){return view('contactanos');}
    
    public function nuevaPersona(){
        return view('nuevaPersona');
    }
    public function registro(){
        return view('registro');
    }
    public function nuevoAlumno(){
        return view('nuevoAlumno');
    }
    public function inicio(){
        return view('inicio');
    }
    public function nuevoTrabajador(){
        return view('nuevoTrabajador');
    }
    public function nuevoDocente(){
        return view('nuevoDocente');
    }
    public function registrado(){
        return view('registrado');
    }
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
    /* Se puede usar el request solo aqui*/
    public function registrar(Request $request){
        $this->validate($request,[
            'CarnetDeIdentidad'=>'required',
            'Nombre(s)'=>'required',
            'ApellidoPaterno'=>'required',
            'ApellidoMaterno'=>'required',
            'Sexo'=>'required',
            'Correo'=>'email|required',/* ['email','required'] */
            'FechaDeNacimiento'=>'required',
            'Nacionalidad'=>'required',
            'DireccionDomicilio'=>'required'
        ]);
        return $request->all();
        // if($this->request->has('nombre')){
        //     return $this->request->nombre;
        // }
    }
    public function parametroEjemplo($p){
        return view('ejemplo',compact('p'));
    }
}
