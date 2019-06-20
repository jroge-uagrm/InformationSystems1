<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorPersonas extends Controller
{
    public static function personas($extend){
        $personas=DB::table('persona')->get();
        return view('persona.mostrar',compact('personas','extend'));
    }
    public static function crear($extend){
        return view('persona.crear',compact('extend'));
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
}