@extends('master')
@section('body')
<!-- Aqui llegan estos parametros:  
    {s{$nombreUsuario}}
    {s{$contrasenhaUsuario}}
    {s{$tipoPersona}}-->
        <div class="costado">
            <ul class="disponibles">
                <a href="cursosDisponibles"><span>
                Cursos Disponibles</span></a>
                <a href="cursosTomados"><span>
                Cursos Tomados</span></a>
                <a href="miHorarioAlumno"><span>
                Mi Horario</span></a>
                <a href="pagos"><span>
                Pagos</span></a>
                <a href="cerrarSesionAlumno"><span>
                Cerrar Sesion</span></a>
            </ul>
            <div class="mostrar">
                <!-- <label for="mostrarNombre">{s{$nombreUsuario}}</label> -->
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