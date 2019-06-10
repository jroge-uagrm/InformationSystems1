@extends('inicio')
@section('parrafo')
<br>
    <form method="POST" action="usuario">
        <label for="nombreUsuario">
            Usuario:
            <br>
            <input type="text"name="nombreUsuario" value="{{old('nombreUsuario')}}">
            {!!$errors->first('nombreUsuario','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <label for="contraseñaUsuario">
            Contraseña:
            <br>
            <input type="password"name="contraseñaUsuario">
            {!!$errors->first('contraseñaUsuario','<span class="error">:message</span>')!!}
        </label>
        <br><br><br>
        <button class="boton"type="submit" value="Iniciar Sesion">Iniciar Sesion</button>
    </form>
@endsection