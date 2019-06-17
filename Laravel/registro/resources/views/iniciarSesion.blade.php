@extends('inicio')
@section('parrafo')
<br>
    <form method="POST" action="usuario">
        <label for="nombreUsuari">
            Usuario:
            <br>
            <input type="text"name="nombreUsuario" value="{{old('nombreUsuario')}}{{$nombre}}">
            {!!$errors->first('nombreUsuario','<span class="error">:message</span>')!!}
            <label class="error"for="usuarioNoExiste">{{$noExiste}}</label>
        </label>
        <br><br>
        <label for="contrasenaUsuario">
            Contraseña:
            <br>
            <input type="password"name="contrasenhaUsuario"value="{{old('contrasenhaUsuario')}}{{$contraseña}}">
            {!!$errors->first('contrasenhaUsuario','<span class="error">:message</span>')!!}
            <label class="error"for="usuarioNoExiste">{{$contraNoExiste}}</label>
        </label>
        <br><br>
        <label for ="tipoPersona">
            <input type="radio"name="tipoPersona"value="A"checked>
            Alumno
            <br>
            <input type="radio"name="tipoPersona" value="D"> 
            Docente
            <br>
            <input type="radio"name="tipoPersona" value="T">
            Trabajador
            <!-- {s!s!s$errors->first('tipoPersona','<span class=error>:message</span>')!!} -->
        <br><br><br>
        <!-- <button class="boton"type="submit" value="Iniciar Sesion">Iniciar Sesion</button> -->        
        <button class="boton">Iniciar Sesion</button>
    </form>
@endsection








