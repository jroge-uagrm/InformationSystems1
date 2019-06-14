@extends('master')
@section('body')
<!-- Aqui llegan estos parametros:  
    {s{$nombreUsuario}}
    {s{$contrasenhaUsuario}}
    {s{$tipoPersona}}-->
        <div class="costado">
            <ul class="disponibles">
                <a href="registrarPersona"><span>
                Registrar Persona</span></a>
                <a href="cursosTomados"><span>
                Cursos</span></a>
                <a href="miHorario"><span>
                Pagos</span></a>
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