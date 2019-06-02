@extends('master')
@section('titulo','INICIO')
@section('cabeza','inicio')
    INICIO
@section('pie')
    <a href="nuevaPersona">Registrar Nueva Persona</a><br>
    <!-- <a href="nuevoRegistro"class="{{ request()->is('/') ? 'importante':''}}">Registrar Nueva Persona</a><br> -->
@endsection
