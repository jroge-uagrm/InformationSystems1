@extends('master')
@section('body')
<!-- Aqui llegan estos parametros:  
    {s{$nombreUsuario}}
    {s{$contrasenhaUsuario}}
    {s{$tipoPersona}}-->
        <div class="costado">
            <ul class="disponiblesAlumno">
                <a href="cursosDisponibles"><span>
                Cursos Disponibles
                </span></a>
                <a href="cursosTomados"><span>Cursos Tomados
                </span></a>
                <a href="miHorario"><span>
                Mi Horario
                </span></a>
                <a href="pagos"><span>
                Pagos
                </span></a>
            @elseif($tipoPersona=='D')
                <a href="misCursos"><span>Mis Cursos
                </span></a>
                <a href="horarios"><span>Horarios
                </span></a>
                <a href="pagos"><span>Pagos
                </span></a>
            @else
                <label for="pestanhas">Trabajador</label>
            @endif
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