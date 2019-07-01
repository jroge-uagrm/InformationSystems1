@extends('master')
@section('body')
<form class="formIniciarSesion"method="POST" action="usuario">
            <label>
                Usuario:
                <br>
                <input type="text"name="nombreUsuario"value="{{old('nombreUsuario')}}{{$nombre}}">
                {!!$errors->first('nombreUsuario','<span class="error">:message</span>')!!}
                <code class="errorForm">{{$noExiste}}</code>
            </label>
            <br><br><br>
            <label for="contrasenaUsuario">
                Contraseña:
                <br>
                <input type="password"name="contrasenhaUsuario"value="{{old('contrasenhaUsuario')}}{{$contraseña}}">
                {!!$errors->first('contrasenhaUsuario','<span class="error">:message</span>')!!}
                <code class="errorForm">{{$contraNoExiste}}</code>
            </label>
            <br><br><br>
            <label for ="tipoPersona">
                <input type="radio"name="tipoPersona"value="A"checked>
                Alumno
                <code class="errorForm">{{$noEsAlumno}}</code>
                <br>
                <input type="radio"name="tipoPersona" value="D"> 
                Docente
                <code class="errorForm">{{$noEsDocente}}</code>
                <br>
                <input type="radio"name="tipoPersona" value="T">
                Trabajador
                <code class="errorForm">{{$noEsTrabajador}}</code>
            <br><br>
            <button>Iniciar Sesion</button>
        </form>
@endsection








