@extends('usuarioTrabajador')
@section('mostrar')
    <form method="POST" action="registro">
        <label for ="Carnet de Identidad">
            CI:
            <input type="text" name="CI" value="{{old('CarnetDeIdentidad')}}">
            {!!$errors->first('CI','<span class=error>:message</span>')!!}
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
        <!-- <label for ="Sexo">
            Sexo:   HOMBRE<input type="radio" name="Sexo" value="H" >
                    MUJER<input type="radio" name="Sexo" value="M">
                     {!!$errors->first('Sexo','<span class=error>:message</span>')!!}
        </label><br><br> -->
        <label for ="Telefono">
            Telefono:
            <input type="text"name="Telefono"value="{{old('Telefono')}}">
            {!!$errors->first('Telefono','<span class=error>:message</span>')!!}
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
            {!!$errors->first('Nacionalidad','<span class=error>:message</span>')!!}
        </label><br><br>
        <input type="submit" name="Registrar" value="RegistrarPersona">
        <!-- <input type="reset" name="Borrar" value="BorrarEspacios"> -->
    </form>
@endsection