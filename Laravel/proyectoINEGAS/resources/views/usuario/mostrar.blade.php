@extends($extend)
@section('mostrar')
    <h1>USUARIOS</h1>
    <button class="botonRegular">
        <a href="usuarioTrabajador-usuarios-crear">Crear Usuario</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-usuarios-editar">Editar Usuario</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-usuarios-eliminar">Eliminar Usuario</a>
    </button>
    @foreach($usuarios as $usuario)
        <p> <b>Usuario:</b> {{$usuario->nombreUsuario}}<br>
            <b>Privilegio:</b> {{$usuario->privilegio}}<br>
            <b>Nombre(s):</b> {{$usuario->nombrePersona}}<br>
            <b>Apellidos:</b> {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}
        </p>
    @endforeach
@endsection