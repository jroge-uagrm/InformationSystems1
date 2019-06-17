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
    public static function nombresPersonas(){
        return $personas=DB::table('persona')
                ->select('codigo','apellidoPaterno','apellidoMaterno','nombre')
                ->orderBy('apellidoPaterno', 'asc')
                ->get();
        return $personas;
    }
}