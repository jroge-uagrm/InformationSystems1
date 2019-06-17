@extends('master')
@section('body')
<!-- Aqui llegan estos parametros:  
    {s{$nombreUsuario}}
    {s{$contrasenhaUsuario}}
    {s{$tipoPersona}}-->
        <div class="costado">
            <ul class="disponibles">
                <a href="personas"><span>
                Personas</span></a>
                <a href="alumnos"><span>
                Alumnos</span></a>
                <a href="cursos"><span>
                Cursos</span></a>
                <a href="pagos"><span>
                Pagos</span></a>
                <a href="usuarios"><span>
                Usuarios</span></a>
                <a href="cerrarSesion"><span>
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