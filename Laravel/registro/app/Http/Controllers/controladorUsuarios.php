<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorUsuarios extends Controller
{
    public static function usuarios(){
        return $usuarios=DB::table('usuario')
                ->join('persona', 'usuario.codigoPersona', '=', 'persona.codigo')
                ->select(   'usuario.nombre as nombreUsuario',
                            'usuario.privilegio',
                            'persona.nombre as nombrePersona',
                            'persona.apellidoPaterno',
                            'persona.apellidoMaterno')
                ->get();
    }
    public static function crearUsuario($extend){
        $nuevoNombreUsuario="";$nuevaContraseña="";
        $nombreOcupado="";$contraseñaInvalida="";
        $personas=controladorPersonas::nombresPersonas();
        return view('usuario.crear',compact(
            'extend',
            'personas',
            'nuevoNombreUsuario',
            'nuevaContraseña',
            'nombreOcupado',
            'contraseñaInvalida'
        ));
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
}













