@extends('master')
@section('body')
<!-- Aqui llegan estos parametros:  
    {s{$nombreUsuario}}
    {s{$contrasenhaUsuario}}
    {s{$tipoPersona}}-->
        <div class="costado">
            <ul class="disponibles">
                <a href="misCursos"><span>
                Mis Cursos</span></a>
                <a href="listasDeAlumnos"><span>
                Listas de Alumnos</span></a>
                <a href="miHorarioDocente"><span>
                Mi Horario</span></a>
                <a href="cerrarSesionDocente"><span>
                Cerrar Sesion</span></a>
            </ul>
            <div class="mostrar">
                @section('mostrar')
                @show
            </div>
            <div>
                <br>
                <br>
                <label class="transparente">space</label>
            </div>
        </div>
@endsection