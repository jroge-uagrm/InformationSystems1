<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controlador extends Controller
{
    // Protected $request;

    // public function __construct(Request $request){
    //     $this->request=$request;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function inicio(){
        return view('inicio');
    }
    public function registro(){
        return view('registro');
    }
    public function registrados(){
        $nombre='Jroge';
        $apellidos='Torrez';
        $correo='jroge@gmail.com';
        return view('registrados')->with([
            'nombreVista'=>$nombre,
            'apellidosVista'=>$apellidos,
            'correoVista'=>$correo
        ]);
    }
    /* Se puede usar el request solo aqui*/
    public function registrar(Request $request){
        $this->validate($request,[
            'Nombre(s)'=>'required',
            'Apellidos'=>'required',
            'Correo'=>'email|required',/* ['email','required'] */
            'Sexo'=>'required',
            'contraseña'=>'required',
            'confirmarContraseña'=>'required'
        ]);
        return $request->all();
        // if($this->request->has('nombre')){
        //     return $this->request->nombre;
        // }
    }
    public function parametroEjemplo($p){
        return view('ejemplo',compact('p'));
    }
}
