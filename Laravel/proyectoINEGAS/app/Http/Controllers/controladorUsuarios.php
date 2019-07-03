<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class controladorUsuarios extends Controller
{
    public function usuarios(){
        $extend="usuario.usuarioTrabajador";
        $usuarios=DB::table('usuario')
                ->join('persona', 'usuario.codigoPersona', '=', 'persona.codigo')
                ->select(   'usuario.nombre as nombreUsuario',
                            'usuario.privilegio',
                            'persona.nombre as nombrePersona',
                            'persona.apellidoPaterno',
                            'persona.apellidoMaterno')
                ->get();
        return view('usuario.mostrar',compact('extend','usuarios'));
    }
    public function crear(){
        $extend="usuario.usuarioTrabajador";
        $nuevoNombreUsuario="";$nuevaContraseña="";
        $nombreOcupado="";$contraseñaInvalida="";
        $personas=controladorPersonas::nombresPersonasSinUsuario();
        return view('usuario.crear',compact(
            'extend',
            'personas',
            'nuevoNombreUsuario',
            'nuevaContraseña',
            'nombreOcupado',
            'contraseñaInvalida'
        ));
    }
    public function editar(){
        $extend="usuario.usuarioTrabajador";
        $usuarios=DB::table('usuario')->select('nombre')->orderBy('nombre','asc')->get();
        return view('usuario.elegirUsuario',compact('usuarios','extend'));
    }
    public function eliminar(){
        $extend="usuario.usuarioTrabajador";
        return view('usuario.eliminar',compact('extend'));
    }
    ///////////////////////////////////////////////////////////////
    public function verificarCreacionUsuario(Request $request){
        $extend="usuario.usuarioTrabajador";
        $this->validate($request,[
            'nuevoNombreUsuario'=>'required|max:30',
            'nuevaContraseña'=>'required|max:30',
            'privilegio'=>'required',
            'codigoPersona'=>'required'
        ]);
        if(!$this->existeUsuario($request->input('nuevoNombreUsuario'))){
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
        if(!$this->existeUsuario($request->input('nuevoNombreUsuario'))){
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














