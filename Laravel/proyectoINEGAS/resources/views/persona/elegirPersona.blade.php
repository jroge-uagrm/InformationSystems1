@extends($extend)
@section('mostrar')
    <h1>EDITAR PERSONA</h1>
<form action="editarPersona" method="post">
    <label><b>Ingrese el Carnet de Identidad de la persona a modificar: </b>
    <br><br>
        <input type="text"name="ci"value="{{old('ci')}}{{$antiguoCi}}">
    </label>
    {!!$errors->first('ci','<span class="error">:message</span>')!!}
    <label class="error"for="ciNoExiste">{{$ciNoExiste}}</label>
    <br><br>
    <button class="botonRegular">EDITAR</button>
</form>
@endsection