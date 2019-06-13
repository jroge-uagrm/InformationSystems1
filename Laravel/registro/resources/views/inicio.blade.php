@extends('master')
@section('body')
    <div class="centro">
        <ul class="tabs">
            <a href="cursos"><span>Cursos
            </span></a>
            <a href="informacion"><span>Informacion
            </span></a>
            <a href="contactanos"><span>Contáctanos
            </span></a>
            <a href="iniciarSesion"><span>Iniciar Sesion
            </span></a>
        </ul>
        <div class="parrafo">
            <br>
            @section('parrafo')
            @show
            <br>
            <label class="transparente">space</label>
        </div>
    </div>
@endsection