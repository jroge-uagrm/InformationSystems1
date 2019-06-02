@extends('master')
@section('titulo','Registro')
@section('cabezera','REGISTRO DE ALUMNOS')
@section('contenido')
    <form method="POST" action="registro">
        <label for ="DireccionDomicilio">
            Direccion de Domicilio:
            <input type="text" name="DireccionDomicilio" value="{{old('DireccionDomicilio')}}">
            {!!$errors->first('DireccionDomicilio','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for="LugarDeTrabajo">
            Lugar de Trabajo:
            <input type="text" name="LugarDeTrabajo" value="{{old('LugarDeTrabajo')}}">
            {!!$errors->first('LugarDeTrabajo','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for="DireccionDeTrabajo">
            Direccion del trabajo:
            <input type="text"name="DireccionDeTrabajo" value="{{old('DireccionDeTrabajo')}}">
            {!!$errors->first('DireccionDeTrabajo','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for="CargoEnElTrabajo">
            Cargo en e Trabajo:
            <input type="text"name="CargoEnElTrabajo"value="{{old('CargoEnElTrabajo')}}">
            {!!$errors->first('CargoEnElTrabajo','<span class=error>:message</span>')!!}
        </label><br><br>
    <button><a href="registrado"class="{{ request()->is('/') ? 'importante':''}}">REGISTRAR</a></button>
@endsection
@section('pie')
    <a href="/">Inicio</a><br>
    <!-- <a href="nuevoRegistro"class="{{ request()->is('/') ? 'importante':''}}">Registrar Nueva Persona</a><br> -->
@endsection
