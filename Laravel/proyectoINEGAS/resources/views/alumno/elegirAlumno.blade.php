@extends($extend)
@section('mostrar')
<h1>EDITAR ALUMNO</h1>
<form action="editarAlumno" method="post">
    <label><b>Ingrese el Codigo del Alumno a modificar: </b>
    <br><br>
        <input type="text"name="codigo"value="{{old('codigo')}}{{$antiguoCodigo}}">
    </label>
    {!!$errors->first('codigo','<span class="error">:message</span>')!!}
    <label class="error">{{$codigoNoExiste}}</label>
    <br><br>
    <button class="botonRegular">EDITAR</button>
</form>
@endsection