@extends($extend)
@section('mostrar')
<h1>EDITAR USUARIO</h1>
<label>Seleccione el Usuario a Editar</label>
<br><br>
<form action="editarUsuario" method="post">
    <select name="nombreUsuario">
        <option selected="true"disabled="disabled">Seleccionar</option>
        @foreach($usuarios as $usuario)
            <option value="{{$usuario->nombre}}">
                {{$usuario->nombre}}
            </option>
        @endforeach
    </select>
    {!!$errors->first('nombreUsuario','<span class="error">:message</span>')!!}
    <br><br>
    <button class="botonRegular">EDITAR</button>
</form>
@endsection