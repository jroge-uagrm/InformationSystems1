@extends($extend)
@section('mostrar')
<h1>EDITAR ALUMNO</h1>
    <form action="nuevoAlumno" method="post">
        <label><b>CI de la persona:</b>
            <input type="text"name="ci"value="{{old('ci')}}{{$antiguoCi}}">
            {!!$errors->first('ci','<span class="error">:message</span>')!!}
            <label class="error"for="ciNoExiste">{{$ciNoExiste}}</label>
        </label>
        <br><br>
        <label><b>Nombre de la universidad:</b>
            <input type="text"name="nombreUniversidad"value="{{old('nombreUniversidad')}}{{$antiguaUniversidad}}">
            {!!$errors->first('nombrePersona','<span class="error">:message</span>')!!}
        </label>
        <br><br>
        <button class="botonRegular">REGISTRAR</button>
    </form>
@endsection