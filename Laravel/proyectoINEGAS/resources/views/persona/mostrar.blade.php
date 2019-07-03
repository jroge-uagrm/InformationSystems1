@extends($extend)
@section('mostrar')
<h1>PERSONAS</h1>
    <button class="botonRegular">
        <a href="usuarioTrabajador-personas-crear">Registrar Persona</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-personas-editar">Editar Persona</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-personas-eliminar">Eliminar Persona</a>
    </button>
    @foreach ($personas as $persona)
        <p> 
            <b>CI       :</b> {{$persona->ci}}<br>
            <b>Nombre(s):</b> {{$persona->nombre}}<br>
            <b>Apellidos:</b> {{$persona->apellidoPaterno}} {{$persona->apellidoMaterno}}<br>        
            <b>Telefono :</b> {{$persona->telefono}}<br>
            <b>Correo   :</b> {{$persona->correo}}<br>
            <b>Fecha Nac:</b> {{$persona->fechaNacimiento}}
        </p>
        <br>
    @endforeach
@endsection