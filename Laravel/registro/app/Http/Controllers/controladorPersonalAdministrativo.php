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

    //////////////////////////////////////////////////////////////
    
    public function usuarios(){
        $extend="usuario.usuarioTrabajador";
        return controladorUsuarios::usuarios($extend);
    }
    public function crearUsuario(){
        $extend="usuario.usuarioTrabajador";
        return controladorUsuarios::crearUsuario($extend);
    }

    
    //////////////////////////////////////////////////////////////////
    
    public function cerrarSesion(){
        $extend="usuario.usuarioTrabajador";
        return view('cerrarSesion',compact('extend'));
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
            $personas=controladorPersonas::nombresPersonas();
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
}