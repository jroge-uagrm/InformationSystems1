@extends('master')
@section('body')
<!-- Aqui llegan estos parametros:  
    {s{$nombreUsuario}}
    {s{$contrasenhaUsuario}}
    {s{$tipoPersona}}-->
        <div class="costado">
            <ul class="disponiblesAlumno">
            <a href="cursosDisponibles"><span>
                Inscribir Alumno</span></a>
                <a href="cursosTomados"><span>
                Cursos</span></a>
                <a href="miHorario"><span>
                Pagos</span></a>
                <a href="pagos"><span>
                Pagos</span></a>
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