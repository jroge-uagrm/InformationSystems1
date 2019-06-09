@extends('master')
@section('body')
    <div class="centro">
        <ul class="tabs">
            <li><a href="cursos"><span>Cursos
            </span></a></li>
            <li><a href="informacion"><span>Informacion
            </span></a></li>
            <li><a href="contactanos"><span>Contáctanos
            </span></a></li>
            <li><a href="iniciarSesion"><span>Iniciar Sesion
            </span></a></li>
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