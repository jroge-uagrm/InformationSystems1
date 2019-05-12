@extends('master')
@section('titulo','Registrados')
@section('contenido')

    <h2>Registrados</h2>
    <h3>Nombre : <?php echo $nombreVista; ?></h3>
    <h3>Apellidos : {{$apellidosVista}} </h3>
    <h3>Correo : {{$correoVista}} </h3>
@endsection
