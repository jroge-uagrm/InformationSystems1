@extends('inicio')
@section('parrafo')
    <!-- Aqui llega la lista de los cursos -->
    @foreach ($listaDeCursos as $curso)
        <label for="a">{{$curso}}</label>
        <br>
    @endforeach
@endsection