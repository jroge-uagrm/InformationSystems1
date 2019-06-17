<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorUsuarios extends Controller
{
    public function usuarios(){
        return view('usuarios');
    }
    public function existeUsuario($nombre){
        $usuario=DB::table('usuario')->where('nombre',$nombre)->first();
        return $usuario!="";
    }
    public function contraseñaCorrecta($nombre,$contraseña){
        $correcto=DB::table('usuario')
            ->where([
                ['nombre','=',$nombre],
                ['contraseña','=',$contraseña],
            ])->first();
        return $correcto!="";
    }
}