@extends($extend)
@section('mostrar')
<h1>EDITAR PERSONA</h1>
    <form action="confirmarCambiosPersona" method="post">
        <label><b>CI:</b>
            <input type="text"name="CI"value="{{old('CI')}}{{$persona->ci}}">
            {!!$errors->first('CI','<span class="error">:message</span>')!!}
            <label class="error"for="ciYaExiste">{{$ciYaExiste}}</label>
        </label>
        <br><br>
        <label><b>Nombre(s):</b>
            <input type="text"name="nombrePersona"value="{{old('nombrePersona')}}{{$persona->nombre}}">
            {!!$errors->first('nombrePersona','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <label><b>Apellido Paterno:</b>
            <input type="text"name="apellidoPaterno"value="{{old('apellidoPaterno')}}{{$persona->apellidoPaterno}}">
            {!!$errors->first('apellidoPaterno','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <label><b>Apellido Materno:</b>
            <input type="text"name="apellidoMaterno"value="{{old('apellidoMaterno')}}{{$persona->apellidoMaterno}}">
            {!!$errors->first('apellidoMaterno','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <label><b>Telefono:</b>
            <input type="text"name="telefono"value="{{old('telefono')}}{{$persona->telefono}}">
        </label>
        <br><br>
        <label><b>Correo:</b>
            <input type="text"name="correo"value="{{old('correo')}}{{$persona->correo}}">
        </label>
        <br><br>
        <label><b>Fecha de Nacimiento:</b>
            <input type="date"name="fechaNacimiento"value="{{old('fechaNacimiento')}}{{$persona->fechaNacimiento}}"">
            {!!$errors->first('fechaNacimiento','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <button class="botonRegular">CONFIRMAR</button>
    </form>
@endsection