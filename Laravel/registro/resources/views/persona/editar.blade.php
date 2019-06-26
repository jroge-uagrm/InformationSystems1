@extends($extend)
@section('mostrar')
<h1>EDITAR PERSONA</h1>
    <form action="nuevaPersona" method="post">
        <label><b>CI:</b>
            <input type="text"name="CI"value="{{old('CI')}}">
            {!!$errors->first('CI','<span class="error">:message</span>')!!}
            <label class="error"for="ciYaExiste">{{$ciYaExiste}}</label>
        </label>
        <br><br>
        <label><b>Nombre(s):</b>
            <input type="text"name="nombrePersona"value="{{old('nombrePersona')}}">
            {!!$errors->first('nombrePersona','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <label><b>Apellido Paterno:</b>
            <input type="text"name="apellidoPaterno"value="{{old('apellidoPaterno')}}">
            {!!$errors->first('apellidoPaterno','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <label><b>Apellido Materno:</b>
            <input type="text"name="apellidoMaterno"value="{{old('apellidoMaterno')}}">
            {!!$errors->first('apellidoMaterno','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <label><b>Telefono:</b>
            <input type="text"name="telefono"value="{{old('telefono')}}">
        </label>
        <br><br>
        <label><b>Correo:</b>
            <input type="text"name="correo"value="{{old('correo')}}">
        </label>
        <br><br>
        <label><b>Fecha de Nacimiento:</b>
            <input type="date"name="fechaNacimiento"value="{{old('fechaNacimiento')}}">
            {!!$errors->first('fechaNacimiento','<span class="error">:message</span>')!!}
        </label>
        <br><br>

        <input class="botonRegular"type="submit"value="REGISTRAR">
    </form>
@endsection