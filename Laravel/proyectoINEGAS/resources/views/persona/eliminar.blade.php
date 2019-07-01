@extends($extend)
@section('mostrar')
<h1>ELIMINAR PERSONA</h1>
<form action="eliminarPersona" method="post">
    <label><b>Ingrese el Carnet de Identidad de la persona a eliminar: </b>
    <br><br>
        <input type="text"name="ci"value="{{old('ci')}}{{$antiguoCi}}">
    </label>
    {!!$errors->first('ci','<span class="error">:message</span>')!!}
    <label class="error">{{$ciNoExiste}}</label>
    <br><br>
    <button class="botonRegular">ELIMINAR</button>
</form>
@endsection