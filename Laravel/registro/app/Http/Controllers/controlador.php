<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controlador extends Controller
{
    public function inicio(){
        return view('inicio');
    }
    public function informacion(){
        return view('informacion');
    }
    public function iniciarSesion(){
        $nombre="";$noExiste="";$contraseña="";$contraNoExiste="";
        return view('iniciarSesion',compact('nombre','noExiste','contraseña','contraNoExiste'));
    }
    public function contactanos(){
        return view('contactanos');
    }
    public function cursos(){
        $cursos=controladorCursos::cursos();
        return view('curso.mostrar',compact('cursos'));
    }
    public function verificarInicioDeSesion(Request $request){
        $this->validate($request,[
            'nombreUsuario'=>'required|max:30',
            'contrasenhaUsuario'=>'required|max:30',
        ]);
        if(controladorUsuarios::existeUsuario($request->input('nombreUsuario'))){
            if(controladorUsuarios::contraseñaCorrecta(
            $request->input('nombreUsuario'),
            $request->input('contrasenhaUsuario'))){
                if($request->tipoPersona=='A'){
                    return view('usuario.usuarioAlumno');
                }elseif ($request->tipoPersona=='D'){
                    return view('usuario.usuarioDocente');
                }else{
                    return view('usuario.usuarioTrabajador');
                }
            }else{
                $nombre=$request->input('nombreUsuario');
                $noExiste="";
                $contraseña=$request->input('contrasenhaUsuario');
                $contraNoExiste="Contreseña incorrecta";
                return view('iniciarSesion',compact('nombre','noExiste','contraseña','contraNoExiste'));                
            }
        }else{
            $nombre=$request->input('nombreUsuario');
            $noExiste="Usuario no existe";
            $contraseña=$request->input('contrasenhaUsuario');
            $contraNoExiste="";
            return view('iniciarSesion',compact('nombre','noExiste','contraseña','contraNoExiste'));
        }
    }
    public function verificarRegistroDePersona(Request $request){
        $this->validate($request,[
            'CI'=>'required|max:30',
            'Nombre(s)'=>'required|max:30',
            'ApellidoPaterno'=>'required|max:30',
            'ApellidoMaterno'=>'required|max:30',
            'FechaDeNacimiento'=>'required|max:30',
            'Nacionalidad'=>'required|max:30',
        ]);
        DB::table('persona')->insert([
            "ci"=>$request->input('CI'),
            "nombre"=>$request->input('Nombre(s)'),
            "apellidoPaterno"=>$request->input('ApellidoPaterno'),
            "apellidoMaterno"=>$request->input('ApellidoMaterno'),
            "telefono"=>$request->input('Telefono'),
            "correo"=>$request->input('Correo'),
            "fechaNacimiento"=>$request->input('FechaDeNacimiento'),
            "tipoAlumno"=>1,//$request->input('TipoAlumno'),
            "tipoDocente"=>0,//$request->input('TipoDocente'),
            "tipoTrabajador"=>0,//$request->input('TipoTrabajador'),
            "created_at"=>Carbon::now()
        ]);
        //return $request->all();
        return DB::table('persona')->get();
    }
}
