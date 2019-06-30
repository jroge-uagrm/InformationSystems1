@extends($extend)
@section('mostrar')
<h1>CREAR USUARIO</h1>
<form action="nuevoUsuario" method="post">
    <label>Nombre Nuevo Usuario:<br>
        <input type="text"name="nuevoNombreUsuario"value="{{old('nuevoNombreUsuario')}}{{$nuevoNombreUsuario}}">
        {!!$errors->first('nuevoNombreUsuario','<span class="error">:message</span>')!!}
        <label class="error">{s{$nombreOcupado}}</label>
    </label>
    <br><br>
    <label>Nueva Contraseña:<br>
        <input type="password"name="nuevaContraseña"value="{{old('nuevaContraseña')}}{{$nuevaContraseña}}">
        {!!$errors->first('nuevaContraseña','<span class="error">:message</span>')!!}
        <label class="error">{s{$contraseñaInvalida}}</label>
    </label>
    <br><br>
    <label>Privilegio:<br>
        <select name="privilegio">
            <option selected="true"disabled="disabled"value="seleccionar">Seleccionar</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        {!!$errors->first('privilegio','<span class="error">:message</span>')!!}
    </label>
    <br><br>
    <label>Persona:<br>
        <select name="codigoPersona">
            <option selected="true"disabled="disabled"value="seleccionar">Seleccionar</option>
            @foreach($personas as $persona)
                <option value="{{$persona->codigo}}">
                    {{$persona->apellidoPaterno}} 
                    {{$persona->apellidoMaterno}} 
                    {{$persona->nombre}}
                </option>
            @endforeach
        </select>
        {!!$errors->first('codigoPersona','<span class="error">:message</span>')!!}
    </label>
    <br><br><br>
    <button class="botonRegular">CREAR</button>
</form>
@endsection