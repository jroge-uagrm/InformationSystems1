@extends($extend)
@section('mostrar')
<h1>REGISTRAR PERSONA</h1>
<form action="nuevaPersona" method="post">
    <label>Nombre Nuevo Usuario:<br>
        <input type="text"name="nuevoNombreUsuario"value="{{old('nuevoNombreUsuario')}}{{$nuevoNombreUsuario}}">
        {!!$errors->first('nuevoNombreUsuario','<span class="error">:message</span>')!!}
        <label class="error">{{$nombreOcupado}}</label>
    </label>
    <br><br>
</form>
@endsection