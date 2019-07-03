<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorAlumnos extends Controller
{
    public function alumnos(){
        $extend="usuario.usuarioTrabajador";
        $alumnos=DB::table('alumno')
                ->join('persona', 'alumno.codigoPersona', '=', 'persona.codigo')
                ->select(   'alumno.codigo as codigo',
                            'persona.ci as ci',
                            'persona.apellidoPaterno as apellidoPaterno',
                            'persona.apellidoMaterno as apellidoMaterno',
                            'persona.nombre as nombre',
                            'alumno.universidad as universidad')
                ->get();
        return view('alumno.mostrar',compact('extend','alumnos'));
    }
    public function crear(){
        $extend="usuario.usuarioTrabajador";
        $ciNoExiste="";$antiguoCi="";$antiguaUniversidad="";
        return view('alumno.crear',compact(
            'extend','ciNoExiste',
            'antiguoCi',
            'antiguaUniversidad'
        ));
    }
    public function verificarCreacionAlumno(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'ci'=>'required|numeric'
        ]);
        if(controladorPersonas::existeCi($request->input('ci'))){
            $persona=controladorPersonas::getPersona($request->input('ci'));
            $codigoPersona=$persona->codigo;
            if(!$this->existeAlumno($codigoPersona)){
                DB::table('alumno')->insert([
                    "codigoPersona"=>$codigoPersona,
                    "created_at"=>Carbon::now(),
                    "universidad"=>$request->input('nombreUniversidad')
                ]);
                DB::table('persona')
                    ->where('codigo',$codigoPersona)
                    ->update([
                        'tipoAlumno' => 1,
                        'updated_at'=>Carbon::now()
                    ]);
                $msj="Alumno registrado con exito";
                return view('plantilla',compact('extend','msj'));
            }else{
                $ciNoExiste="Ya Registrado Como Alumno";      
            }
        }else{
            $ciNoExiste="Carnet de Identidad no Existe";
        }
        $antiguoCi=$request->input('ci');
        $antiguaUniversidad=$request->input('nombreUniversidad');
        return view('alumno.crear',compact(
            'extend',
            'ciNoExiste',
            'antiguoCi',
            'antiguaUniversidad'
            ));
    }
    public function editar(){
        $extend="usuario.usuarioTrabajador";
        $codigoNoExiste="";$antiguoCodigo="";
        return view('alumno.elegirAlumno',compact(
            'extend',
            'codigoNoExiste',
            'antiguoCodigo'
        ));
    }   
    public function verificarEdicionAlumno(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'codigo'=>'required|numeric'
        ]);
        if(!$this->existeCodigo($request->input('codigo'))){
            $codigoNoExiste="Codigo de Alumno no Existe";
            $antiguoCodigo=$request->input('codigo');
            return view('alumno.elegirAlumno',compact(
                'extend',
                'codigoNoExiste',
                'antiguoCodigo'));
        }else{
            $alumno=$this->getAlumno($request->input('codigo'));
            return view('alumno.editar',compact(
                'extend','alumno'
            ));
        }
    }
    public function eliminar($extend){
        $extend="usuario.usuarioTrabajador";
        $ciNoExiste="";$antiguoCi="";
        return view('persona.eliminar',compact('extend','ciNoExiste','antiguoCi'));
    } 
    public function verificarEliminacionAlumno(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'ci'=>'required|numeric'
        ]);
        if(!controladorPersonas::existeCi($request->input('ci'))){
            $ciNoExiste="Carnet de Identidad no Existe";
            $antiguoCi=$request->input('ci');
            return view('persona.eliminar',compact('extend','ciNoExiste','antiguoCi'));
        }else{
            DB::table('persona')->where('ci',$request->input('ci'))->delete();
            $msj="Persona eliminada con exito";
            return view('plantilla',compact('extend','msj'));
        }
    }
    ////////////////////////////////////
    public function cerrarSesionAlumno(){
        $tipo="Alumno";
        return view('cerrarSesion',compact('tipo'));
    }
    public static function existeCodigo($codigoABuscar){
        $alumno=DB::table('alumno')->where('codigo',$codigoABuscar)->first();
        return $alumno!="";
    }
    public static function getAlumno($codigoAlumno){
        $alumno=DB::table('alumno')->where('codigo',$codigoAlumno)->first();
        return $alumno;
    }
    public static function existeAlumno($codigoDePersonaABuscar){
        $alumno=DB::table('alumno')->where('codigoPersona',$codigoDePersonaABuscar)->first();
        return $alumno!="";
    }
}