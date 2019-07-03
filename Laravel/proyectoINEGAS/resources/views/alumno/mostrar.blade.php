@extends($extend)
@section('mostrar')
<h1>ALUMNOS</h1>
<button class="botonRegular">
        <a href="usuarioTrabajador-alumnos-crear">Registrar Alumno</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-alumnos-editar">Editar Alumno</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-alumnos-eliminar">Eliminar Alumno</a>
    </button>
    @foreach ($alumnos as $alumno)
        <p> 
            <b>Codigo Alumno:</b> {{$alumno->codigo}}<br>
            <b>CI       :</b> {{$alumno->ci}}<br>
            <b>Nombre(s):</b> {{$alumno->nombre}}<br>
            <b>Apellidos:</b> {{$alumno->apellidoPaterno}} {{$alumno->apellidoMaterno}}<br>
            <b>Universidad: </b>{{$alumno->universidad}}        
        </p>
        <br>
    @endforeach
@endsection