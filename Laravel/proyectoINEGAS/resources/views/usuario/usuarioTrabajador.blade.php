@extends('master')
@section('body')
        <div class="disponibles">
            <ul>
                <li>
                    <a href="usuarioTrabajador-personas">
                        Personas
                    </a>
                </li>
                <li>
                    <a href="usuarioTrabajador-alumnos">
                        Alumnos
                    </a>
                </li>
                <li>
                    <a href="usuarioTrabajador-cursos">
                        Cursos
                    </a>
                </li>
                <li>
                    <a href="usuarioTrabajador-pagos">
                        Pagos
                    </a>
                </li>
                <li>
                    <a href="usuarioTrabajador-usuarios">
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="usuarioTrabajador-cerrarSesion">
                        Cerrar Sesion
                    </a>
                </li>
            </ul>
        </div>
            <div class="mostrar">
                @section('mostrar')
                @show
            </div>
@endsection