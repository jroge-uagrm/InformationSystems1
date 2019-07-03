@extends('master')
@section('body')
        <div class="disponibles">
            <ul>
                <li><a href="usuarioTrabajador-personas">
                    Personas
                </a></li>
                <li><a href="usuarioTrabajador-alumnos">
                    Alumnos
                </a></li>
                <li><a href="usuarioTrabajador-inscripciones">
                    Inscripciones
                </a></li>
                <li><a href="usuarioTrabajador-usuarios">
                    Usuarios
                </a></li>
                <li><a href="usuarioTrabajador-cursos">
                    Cursos
                </a></li>
                <li><a href="usuarioTrabajador-pagos">
                    Pagos
                </a></li>
                <li><a href="usuarioTrabajador-usuarios">
                    Usuarios
                </a></li>
                <li><a href="usuarioTrabajador-aulas">
                    Aulas
                </a></li>
                <li><a href="usuarioTrabajador-cargos">
                    Cargos
                </a></li>
                <li><a href="usuarioTrabajador-Cursos">
                    Cursos
                </a></li>
                <li><a href="usuarioTrabajador-departamentos">
                    Departamentos
                </a></li>
                <li><a href="usuarioTrabajador-dias">
                    Dias de clases
                </a></li>
                <li><a href="usuarioTrabajador-horarios">
                    Horarios de clases
                </a></li>



                <li><a href="usuarioTrabajador-cerrarSesion">
                    Bitacora
                </a></li>
                <li><a href="usuarioTrabajador-cerrarSesion">
                    Cerrar Sesion
                </a></li>
            </ul>
        </div>
            <div class="mostrar">
                @section('mostrar')
                @show
            </div>
@endsection