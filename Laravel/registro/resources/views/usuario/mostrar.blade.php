@extends($extend)
@section('mostrar')
    <h1>USUARIOS: </h1>
    @foreach($usuarios as $usuario)
        <p> Usuario: {{$usuario->nombreUsuario}}<br>
            Privilegio: {{$usuario->privilegio}}<br>
            Nombre(s): {{$usuario->nombrePersona}}<br>
            Apellidos: {{$usuario->apellidoPaterno}} {{$usuario->apellidoMaterno}}
        </p>
    @endforeach
    <br>
    <button class="botonRegular">
        <a href="usuarioTrabajador-usuarios-crear">Crear Usuario</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-usuarios-editar">Editar Usuario</a>
    </button>
    <button class="botonRegular">
        <a href="usuarioTrabajador-usuarios-eliminar">Eliminar Usuario</a>
    </button>
@endsection