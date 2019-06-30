@extends('master')
@section('body')
<form class="formIniciarSesion"method="POST" action="usuario">
            <label>
                Usuario:
                <br>
                <input type="text"name="nombreUsuario"value="{{old('nombreUsuario')}}{{$nombre}}">
                {!!$errors->first('nombreUsuario','<span class="error">:message</span>')!!}
                <code class="error">{{$noExiste}}</code>
            </label>
            <br><br><br>
            <label for="contrasenaUsuario">
                Contraseña:
                <br>
                <input type="password"name="contrasenhaUsuario"value="{{old('contrasenhaUsuario')}}{{$contraseña}}">
                {!!$errors->first('contrasenhaUsuario','<span class="error">:message</span>')!!}
                <code class="error">{{$contraNoExiste}}</code>
            </label>
            <br><br><br>
            <label for ="tipoPersona">
                <input type="radio"name="tipoPersona"value="A"checked>
                Alumno
                <code class="error">{{$noEsAlumno}}</code>
                <br>
                <input type="radio"name="tipoPersona" value="D"> 
                Docente
                <code class="error">{{$noEsDocente}}</code>
                <br>
                <input type="radio"name="tipoPersona" value="T">
                Trabajador
                <code class="error">{{$noEsTrabajador}}</code>
            <br><br>
            <button>Iniciar Sesion</button>
        </form>
@endsection








