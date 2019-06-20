<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controlador extends Controller
{
    public function iniciarSesion(){
        $nombre="";$noExiste="";$contraseña="";$contraNoExiste="";
        return view('iniciarSesion',compact(
            'nombre',
            'noExiste',
            'contraseña',
            'contraNoExiste'
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
                if($request->tipoPersona=='A'){
                    $extend="usuario.usuarioAlumno";
                    $msj="Inicio de sesion como Alumno";
                }elseif($request->tipoPersona=='D'){
                    $extend="usuario.usuarioDocente";
                    $msj="Inicio de sesion como Docente";
                }else{
                    $extend="usuario.usuarioTrabajador";
                    $msj="Inicio de sesion como Trabajador";
                }
                $section="mostrar";
                return view('plantilla',compact('extend','section','msj'));
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
