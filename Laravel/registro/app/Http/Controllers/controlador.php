<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controlador extends Controller
{
    public function iniciarSesion(){
        $nombre="";$noExiste="";$contraseña="";$contraNoExiste="";
        $noEsAlumno="";$noEsDocente="";$noEsTrabajador="";
        return view('iniciarSesion',compact(
            'nombre',
            'noExiste',
            'contraseña',
            'contraNoExiste',
            'noEsAlumno','noEsDocente','noEsTrabajador'
        ));
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
                $nombre=$request->input('nombreUsuario');
                $noExiste="";
                $contraseña=$request->input('contrasenhaUsuario');
                $contraNoExiste="";
                $nombreP=$request->input('nombreUsuario');
                if($request->tipoPersona=='A'){
                    if(controladorUsuarios::usuarioEsDeTipo("tipoAlumno",$nombreP)){
                        $extend="usuario.usuarioAlumno";
                        $msj="Inicio de sesion como Alumno";
                    }else{
                        $noEsAlumno="No Registrado Como Alumno";$noEsDocente="";$noEsTrabajador="";
                        return view('iniciarSesion',compact(
                            'nombre','noExiste','contraseña','contraNoExiste',
                            'noEsAlumno','noEsDocente','noEsTrabajador'));                
                    }
                }elseif($request->tipoPersona=='D'){
                    if(controladorUsuarios::usuarioEsDeTipo("tipoDocente",$nombreP)){
                        $extend="usuario.usuarioDocente";
                        $msj="Inicio de sesion como Docente";
                    }else{
                        $noEsAlumno="";$noEsDocente="No Registrado Como Docente";$noEsTrabajador="";
                        return view('iniciarSesion',compact(
                            'nombre','noExiste','contraseña','contraNoExiste',
                            'noEsAlumno','noEsDocente','noEsTrabajador'));                
                    }
                }else{
                    if(controladorUsuarios::usuarioEsDeTipo("tipoTrabajador",$nombreP)){
                        $extend="usuario.usuarioTrabajador";
                        $msj="Inicio de sesion como Trabajador";
                    }else{
                        $noEsAlumno="";$noEsDocente="";$noEsTrabajador="No Registrado Como Trabajador";
                        return view('iniciarSesion',compact(
                            'nombre','noExiste','contraseña','contraNoExiste',
                            'noEsAlumno','noEsDocente','noEsTrabajador'));
                    }
                }
                $section="mostrar";
                return view('plantilla',compact('extend','section','msj'));
            }else{
                $nombre=$request->input('nombreUsuario');
                $noExiste="";
                $contraseña=$request->input('contrasenhaUsuario');
                $contraNoExiste="Contreseña incorrecta";
                $noEsAlumno="";$noEsDocente="";$noEsTrabajador="";
                return view('iniciarSesion',compact(
                    'nombre','noExiste','contraseña','contraNoExiste',
                    'noEsAlumno','noEsDocente','noEsTrabajador'));                
            }
        }else{
            $nombre=$request->input('nombreUsuario');
            $noExiste="Usuario no existe";
            $contraseña=$request->input('contrasenhaUsuario');
            $contraNoExiste="";
            $noEsAlumno="";$noEsDocente="";$noEsTrabajador="";
            return view('iniciarSesion',compact(
                'nombre','noExiste','contraseña','contraNoExiste',
                'noEsAlumno','noEsDocente','noEsTrabajador'));
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
