<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorPersonas extends Controller
{
    public static function personas($extend){
        $personas=DB::table('persona')->select(
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
    public static function crear($extend){
        $ciYaExiste="";
        $antiguoCi="";
        return view('persona.crear',compact('extend','ciYaExiste','antiguoCi'));
    }
    public static function editar($extend){
        $personas=DB::table('persona')->orderBy('ci','asc')->get();
        $ciNoExiste="";
        $antiguoCi="";
        return view('persona.elegirPersona',compact(
            'extend',
            'personas',
            'ciNoExiste',
            'antiguoCi'
        ));
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
    public static function existeCi($ciABuscar){
        $usuario=DB::table('persona')->where('ci',$ciABuscar)->first();
        return $usuario!="";
    }
}








