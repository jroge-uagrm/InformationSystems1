@extends('master')
@section('body')
        <div class="costado">
            <ul class="disponibles">
                <a href="usuarioTrabajador-personas"><span>
                Personas</span></a>
                <a href="usuarioTrabajador-alumnos"><span>
                Alumnos</span></a>
                <a href="usuarioTrabajador-cursos"><span>
                Cursos</span></a>
                <a href="usuarioTrabajador-pagos"><span>
                Pagos</span></a>
                <a href="usuarioTrabajador-usuarios"><span>
                Usuarios</span></a>
                <a href="usuarioTrabajador-cerrarSesion"><span>
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