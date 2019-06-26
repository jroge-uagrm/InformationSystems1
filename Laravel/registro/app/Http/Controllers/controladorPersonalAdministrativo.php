<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorPersonalAdministrativo extends Controller
{
    public function personas(){
        $extend="usuario.usuarioTrabajador";
        return controladorPersonas::personas($extend);
    }
    public function crearPersona(){
        $extend="usuario.usuarioTrabajador";
        return controladorPersonas::crear($extend);
    }
    public function editarPersona(){
        $extend="usuario.usuarioTrabajador";
        return controladorPersonas::editar($extend);
    }
    public function eliminarPersona(){
        $extend="usuario.usuarioTrabajador";
        return controladorPersonas::eliminar($extend);
    }
    public function verificarCreacionPersona(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'CI'=>'required|numeric',
            'nombrePersona'=>'required|max:30',
            'apellidoPaterno'=>'required|max:30',
            'apellidoMaterno'=>'required|max:30',
            'fechaNacimiento'=>'required',
        ]);
        if(!controladorPersonas::existeCi($request->input('CI'))){
            DB::table('persona')->insert([
                "ci"=>$request->input('CI'),
                "nombre"=>$request->input('nombrePersona'),
                "apellidoPaterno"=>$request->input('apellidoPaterno'),
                "apellidoMaterno"=>$request->input('apellidoMaterno'),
                "telefono"=>$request->input('telefono'),
                "correo"=>$request->input('correo'),
                "fechaNacimiento"=>$request->input('fechaNacimiento'),
                "tipoAlumno"=>0,
                "tipoDocente"=>0,
                "tipoTrabajador"=>0,
                "created_at"=>Carbon::now()
            ]);
            $msj="Persona registrada con exito";
            return view('plantilla',compact('extend','msj'));
        }else{
            $ciYaExiste="Carnet de Identidad no disponible";
            $antiguoCi=$request->input('ci');
            return view('persona.crear',compact('ciYaExiste','extend'));
        }
    }
    public function verificarEdicionPersona(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'ci'=>'required',
        ]);        
        if(!controladorPersonas::existeCi($request->input('ci'))){
            $ciNoExiste="Carnet de Identidad no Existe";
            $antiguoCi=$request->input('ci');
            return view('persona.elegirPersona',compact('extend','ciNoExiste','antiguoCi'));
        }else{
            $persona=DB::table('persona')->where('ci',$request->input('ci'))->get();
            $ciYaExiste="";

            return view('persona.editar',compact('extend','persona'));
        }
    }
    //////////////////////////////////////////////////////////////    
    public function usuarios(){
        $extend="usuario.usuarioTrabajador";
        $usuarios=controladorUsuarios::mostrar();
        return view('usuario.mostrar',compact('extend','usuarios'));
    }
    public function crearUsuario(){
        $extend="usuario.usuarioTrabajador";
        return controladorUsuarios::crear($extend);
    }
    public function editarUsuario(){
        $extend="usuario.usuarioTrabajador";
        return controladorUsuarios::editar($extend);
    }
    public function eliminarUsuario(){
        $extend="usuario.usuarioTrabajador";
        return controladorUsuarios::eliminar($extend);
    }
    public function verificarCreacionUsuario(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'nuevoNombreUsuario'=>'required|max:30',
            'nuevaContraseña'=>'required|max:30',
            'privilegio'=>'required',
            'codigoPersona'=>'required'
        ]);
        if(!controladorUsuarios::existeUsuario($request->input('nuevoNombreUsuario'))){
            DB::table('usuario')->insert([
                "nombre"=>$request->input('nuevoNombreUsuario'),
                "contraseña"=>$request->input('nuevaContraseña'),
                "privilegio"=>$request->input('privilegio'),
                "codigoPersona"=>$request->input('codigoPersona'),
                "created_at"=>Carbon::now()
            ]);
        }else{
            $personas=controladorPersonas::nombresPersonasSinUsuario();
            $nuevoNombreUsuario=$request->input('nuevoNombreUsuario');
            $nuevaContraseña=$request->input('nuevaContraseña');
            $nombreOcupado="No disponible";
            $contraseñaInvalida="";
            return view('usuario.crear',compact(
                'extend',
                'personas',
                'nuevoNombreUsuario',
                'nuevaContraseña',
                'nombreOcupado',
                'contraseñaInvalida'
            ));
        }
        $usuarios=controladorUsuarios::usuarios();
        return view('usuario.mostrar',compact('extend','usuarios'));
    }
    public function verificarEdicionUsuario(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'nombreUsuario'=>'required',
        ]);
        $nuevoNombreUsuario=$request->input('nombreUsuario');
        $viejoNombreUsuario=$request->input('nombreUsuario');
        $nombreOcupado="";
        $nuevaContraseña="";
        $contraseñaInvalida="";
        $elementos=DB::table('usuario')->select('privilegio')->
                    where('nombre',$nuevoNombreUsuario)->get();
        $privilegio=str_split($elementos);
        $viejoPrivilegio=$privilegio[16];
        return view('usuario.editar',compact(
            'extend',
            'viejoNombreUsuario',
            'nuevoNombreUsuario',
            'nombreOcupado',
            'nuevaContraseña',
            'contraseñaInvalida',
            'viejoPrivilegio'
        ));
    }
    public function verificarCambiosUsuario(Request $request){
        $this->validate($request,[
            'nuevoNombreUsuario'=>'required|max:30',
            'nuevaContraseña'=>'required|max:30',
        ]);
        $extend="usuario.usuarioTrabajador";
        if(!controladorUsuarios::existeUsuario($request->input('nuevoNombreUsuario'))){
        DB::table('usuario')
        ->where('nombre',$request->viejoNombreUsuario)
        ->update([
            'nombre'=>$request->input('nuevoNombreUsuario'),
            'contraseña'=>$request->input('nuevaContraseña'),
            'privilegio'=>$request->input('privilegio'),
            ]);
            return'Usuario Actualizado';
        }else{
            return'Usuario ya existe';
        }
        $usuarios=controladorUsuarios::usuarios();
        return "Listo";
    }
    //////////////////////////////////////////////////////////////////

    public function cerrarSesion(){
        $extend="usuario.usuarioTrabajador";
        return view('cerrarSesion',compact('extend'));
    }
}











