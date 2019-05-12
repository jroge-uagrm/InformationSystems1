@extends('master')
@section('titulo','Registro')
@section('contenido')

    <h2>Registro</h2>
    <form method="POST" action="registro">
        <label for ="Nombre(s)">
            Nombre(s) :
            <input type="text" name="Nombre(s)" value="{{old('Nombre(s)')}}">
            {!!$errors->first('Nombre(s)','<span class=error>:message</span>')!!}
        </label>
        <br><br>
        <label for ="Apellidos">
            Apellidos :
            <input type="text" name="Apellidos" value="{{old('Apellidos')}}">
            {!!$errors->first('Apellidos','<span class=error>:message</span>')!!}
        </label>
        <br><br>
        <label for ="Correo">
            Correo :
            <input type="text" name="Correo" value="{{old('Correo')}}">
            {!!$errors->first('Correo','<span class=error>:message</span>')!!}
        </label>
        <br><br>
        <!-- <h3>Sexo :      Hombre<input type="checkbox" name="Sexo">  Mujer<input type="checkbox" name="Sexo"> </h3> -->
        <label for ="Sexo">
            Sexo :  HOMBRE <input type="radio" name="Sexo" value="H" >
                     MUJER <input type="radio" name="Sexo" value="M">
                     {!!$errors->first('Sexo','<span class=error>:message</span>')!!}
        </label>
        <br><br>
        <label for="oficio">
            Oficio :    <select name="Oficio">
                            <!-- <option value="Blancor"> </option> -->
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
    <button><a href="registrar">Registrar persona</a></button>

@endsection
