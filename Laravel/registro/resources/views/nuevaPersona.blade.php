@extends('master')
@section('titulo','Registro')
@section('cabeza','REGISTRAR NUEVA PERSONA')
@section('contenido')
    <h2>Registro</h2>
    <form method="POST" action="registro">
        <label for ="Carnet de Identidad">
            CI:
            <input type="text" name="CI" value="{{old('CarnetDeIdentidad')}}">
            {!!$errors->first('CarnetDeIdentidad','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for="Nombre(s)">
            Nombre(s):
            <input type="text" name="Nombre(s)" value="{{old('Nombre(s)')}}">
            {!!$errors->first('Nombre(s)','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for="ApellidoPaterno">
            Apellido Paterno:
            <input type="text"name="ApellidoPaterno" value="{{old('ApellidoPaterno')}}">
            {!!$errors->first('ApellidoPaterno','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for="ApellidoMaterno">
            Apellido Materno:
            <input type="text"name="ApellidoMaterno"value="{{old('ApellidoMaterno')}}">
            {!!$errors->first('ApellidoMaterno','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for ="Sexo">
            Sexo:   HOMBRE<input type="radio" name="Sexo" value="H" >
                    MUJER<input type="radio" name="Sexo" value="M">
                     {!!$errors->first('Sexo','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for ="Telefono">
            Telefono:
            <input type="text"name="Telefono"value="{{old('Telefono')}}">
            {!!$errors->first('Correo','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for ="Correo">
            Correo:
            <input type="text"name="Correo"value="{{old('Correo')}}">
            {!!$errors->first('Correo','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for ="FechaDeNacimiento">
            Fecha de Nacimiento:
            <input type="date"name="FechaDeNacimiento"value="{{old('FechaDeNacimiento')}}">
            {!!$errors->first('FechaDeNacimiento','<span class=error>:message</span>')!!}
        </label><br><br>
        <label for ="Nacionalidad">
            Nacionalidad:
            <input type="text"name="Nacionalidad"value="{{old('Nacionalidad')}}">
            {!!$errors->first('nacionalidad','<span class=error>:message</span>')!!}
        </label><br><br>
        <!-- <label for="oficio">
            Oficio :    <select name="Oficio">
                            // <option value="Blancor"> </option>
                            <option value="Escolar">Escolar</option>
                            <option value="Universitario">Universitario</option>
                            <option value="Jubilado">Jubilado</option>
                        </select>
        </label>
        <br><br>
        <label for="contraseña">
            Crear contraseña : <input type="password" name="contraseña">
            {!!$errors->first('contraseña','<span class=error>:message</span>')!!}
        </label>
        <br><br>
        <label for="confirmarContraseña">
            Confirmar contraseña : <input type="password" name="confirmarContraseña">
            {!!$errors->first('confirmarContraseña','<span class=error>:message</span>')!!}
        </label>
        <br><br>
        <input type="file" name="files"accept=images text>
        <br><br>
        <input type="submit" name="Registrar" value="RegistrarPersona">
        <input type="reset" name="Borrar" value="BorrarEspacios">
    </form>
    <br><br><br>
    <button><a href="registrar">Registrar persona</a></button> -->
    <button><a href="nuevoAlumno">Nuevo Alumno</a></button>
    <button><a href="nuevoTrabajador">Nuevo Trabajador</a></button>
    <button><a href="nuevoDocente">Registrar como docente</a></button>

@endsection
@section('pie')
    <a href="inicio">Inicio</a><br>
    <!-- <a href="nuevoRegistro"class="{{ request()->is('/') ? 'importante':''}}">Registrar Nueva Persona</a><br> -->
@endsection
