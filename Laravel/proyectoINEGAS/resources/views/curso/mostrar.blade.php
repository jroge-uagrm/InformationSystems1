@extends('inicio')
@section('parrafo')
    @foreach ($cursos as $curso)
        <label>{{$curso->nombre}}, meses: {{$curso->duracion}}, 
                costo: {{$curso->costo}}, cupoTotal:{{$curso->cupoTotal}}, 
                tipo: {{$curso->nombreTipo}}</label>
        <br><br>
    @endforeach
@endsection