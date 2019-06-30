<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorUsuarios extends Controller
{
    public static function mostrar(){
        return $usuarios=DB::table('usuario')
                ->join('persona', 'usuario.codigoPersona', '=', 'persona.codigo')
                ->select(   'usuario.nombre as nombreUsuario',
                            'usuario.privilegio',
                            'persona.nombre as nombrePersona',
                            'persona.apellidoPaterno',
                            'persona.apellidoMaterno')
                ->get();
    }
    public static function crear($extend){
        $nuevoNombreUsuario="";$nuevaContraseña="";
        $nombreOcupado="";$contraseñaInvalida="";
        $personas=controladorPersonas::nombresPersonasSinUsuario();
        return "OK";
        return view('usuario.crear',compact(
            'extend',
            'personas',
            'nuevoNombreUsuario',
            'nuevaContraseña',
            'nombreOcupado',
            'contraseñaInvalida'
        ));
    }
    public static function editar($extend){
        $usuarios=DB::table('usuario')->select('nombre')->orderBy('nombre','asc')->get();
        return view('usuario.elegirUsuario',compact('usuarios','extend'));
    }
    ///////////////////////////////////////////////////////////////
    public static function existeUsuario($nombre){
        $usuario=DB::table('usuario')->where('nombre',$nombre)->first();
        return $usuario!="";
    }
    public static function contraseñaCorrecta($nombre,$contraseña){
        $correcto=DB::table('usuario')
            ->where([
                ['nombre','=',$nombre],
                ['contraseña','=',$contraseña],
            ])->first();
        return $correcto!="";
    }
    public static function usuarioEsDeTipo($tipoPersona,$nombreUsuario){
        $x=$usuarios=DB::table('persona')
                ->join('usuario','usuario.codigoPersona','=','persona.codigo')
                ->where([
                    [$tipoPersona,"1"],
                    ['usuario.nombre',$nombreUsuario]
                ])
                ->get();
        return strlen ($x);
    }
}














