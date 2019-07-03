<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Exception;

class controladorPersonas extends Controller
{
    public function personas(){
        $extend="usuario.usuarioTrabajador";
        $personas=DB::table('persona')->select(
                'codigo',
                'ci',
                'nombre',
                'apellidoPaterno',
                'apellidoMaterno',
                'telefono',
                'correo',
                'fechaNacimiento')
                ->get();
        return view('persona.mostrar',compact('personas','extend'));
    }
    public function crear(){
        $extend="usuario.usuarioTrabajador";
        $ciYaExiste="";
        $antiguoCi="";$antiguoNombre="";$antiguoApellidoPaterno="";
        $antiguoApellidoMaterno="";$antiguoTelefono="";$antiguoCorreo="";
        $antiguaFechaNacimiento="";
        return view('persona.crear',compact(
            'extend','ciYaExiste',
            'antiguoCi',
            'antiguoNombre',
            'antiguoApellidoPaterno',
            'antiguoApellidoMaterno',
            'antiguoTelefono',
            'antiguoCorreo',
            'antiguaFechaNacimiento'
        ));
    }
    public function verificarCreacionPersona(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'CI'=>'required|numeric',
            'nombrePersona'=>'required|max:30',
            'apellidoPaterno'=>'required|max:30',
            'apellidoMaterno'=>'required|max:30',
            'fechaNacimiento'=>'required',
            'telefono'=>'numeric',
        ]);
        if(!$this->existeCi($request->input('CI'))){
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
                "tipoTrabajador"=>1,
                "created_at"=>Carbon::now()
            ]);
            $msj="Persona registrada con exito";
            return view('plantilla',compact('extend','msj'));
        }else{
            $ciYaExiste="Carnet de Identidad en Uso";
            $antiguoCi=$request->input('CI');
            $antiguoNombre=$request->input('nombrePersona');
            $antiguoApellidoPaterno=$request->input('apellidoPaterno');
            $antiguoApellidoMaterno=$request->input('apellidoMaterno');
            $antiguoTelefono=$request->input('telefono');
            $antiguoCorreo=$request->input('correo');
            $antiguaFechaNacimiento=$request->input('fechaNacimiento');
            return view('persona.crear',compact(
                'extend',
                'ciYaExiste',
                'antiguoCi',
                'antiguoNombre',
                'antiguoApellidoPaterno',
                'antiguoApellidoMaterno',
                'antiguoTelefono',
                'antiguoCorreo',
                'antiguaFechaNacimiento'
            ));
        }
    }
    public function editar(){
        $extend="usuario.usuarioTrabajador";
        $ciNoExiste="";$antiguoCi="";
        return view('persona.elegirPersona',compact(
            'extend',
            'ciNoExiste',
            'antiguoCi'
        ));
    }
    public function verificarEdicionPersona(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'ci'=>'required|numeric'
        ]);
        if(!$this->existeCi($request->input('ci'))){
            $ciNoExiste="Carnet de Identidad no Registrado";
            $antiguoCi=$request->input('ci');
            return view('persona.elegirPersona',compact('extend','ciNoExiste','antiguoCi'));
        }else{
            $persona=$this->getPersona($request->input('ci'));
            $f=$persona->fechaNacimiento;
            $fecha=substr($f, 0, 10);
            return view('persona.editar',compact(
                'extend','persona','fecha'
            ));
        }
    }
    public function verificarCambiosPersona(Request $request){
        $this->validate($request,[
            'nombrePersona'=>'required',
            'apellidoPaterno'=>'required',
            'apellidoMaterno'=>'required',
            'telefono'=>'numeric',
            'fechaNacimiento'=>'required',
        ]);
        DB::table('persona')
            ->where('ci',$request->input('ci'))
            ->update([
                'nombre' => $request->input('nombrePersona'),
                'apellidoPaterno' => $request->input('apellidoPaterno'),
                'apellidoMaterno' => $request->input('apellidoMaterno'),
                'telefono' => $request->input('telefono'),
                'correo' => $request->input('correo'),
                'fechaNacimiento' => $request->input('fechaNacimiento'),
                "updated_at"=>Carbon::now()
            ]);
            $extend="usuario.usuarioTrabajador";
            $msj="Persona modificada con exito";
        return view('plantilla',compact('extend','msj'));
    }
    public function eliminar(){
        $extend="usuario.usuarioTrabajador";
        $ciNoExiste="";$antiguoCi="";
        return view('persona.eliminar',
        compact('extend','ciNoExiste','antiguoCi'));
    }
    public function verificarEliminacionPersona(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'ci'=>'required|numeric'
        ]);
        if(!$this->existeCi($request->input('ci'))){
            $ciNoExiste="Carnet de Identidad no Existe";
            $antiguoCi=$request->input('ci');
            return view('persona.eliminar',compact('extend','ciNoExiste','antiguoCi'));
        }else{
            try{
                DB::table('persona')
                ->where('ci',$request->input('ci'))
                ->delete();
                $msj="Persona eliminada con exito";
            }catch(Exception $e){
                $msj="No se puede eliminar a la persona";
            }finally{
                return view('plantilla',compact('extend','msj'));
            }
        }
    }
    ///////////////////////////////////////////////
    public static function existeCi($ciABuscar){
        $usuario=DB::table('persona')->where('ci',$ciABuscar)->first();
        return $usuario!="";
    }
    public static function nombresPersonasSinUsuario(){
        return $personas=DB::table('persona')
                ->select('codigo','apellidoPaterno','apellidoMaterno','nombre')
                ->whereNotExists(function($query){
                    $query->select(DB::raw(1))
                        ->from('usuario')
                        ->whereRaw('usuario.codigoPersona = persona.codigo');
                })
                ->orderBy('apellidoPaterno','asc')
                ->get();
        return $personas;
    }
    public static function getPersona($ciPersona){
        $persona=DB::table('persona')
        ->where('ci',$ciPersona)
        ->first();
        return $persona;
    }
}








