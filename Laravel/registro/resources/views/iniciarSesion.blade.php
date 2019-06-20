@extends('master')
@section('body')
<div class="costado">
    <div class="mostrar">
        <form class="formGrande"method="POST" action="usuario">
            <label>
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
            <br><br><br>
            <button class="boton">Iniciar Sesion</button>
        </form>
    </div>
</div>
@endsection








