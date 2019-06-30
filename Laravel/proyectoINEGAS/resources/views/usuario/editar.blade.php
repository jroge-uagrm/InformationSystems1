@extends($extend)
@section('mostrar')
<h1>EDITAR USUARIO</h1>
<form method="POST" action="confirmarCambiosUsuario">
    <label for="viejoNombreUsuario">Nombre Usuario Actual: {{$viejoNombreUsuario}}</label>
    <br>
    <label>Privilegio Actual: {{$viejoPrivilegio}}</label>
    <br><br>
    <label>Nuevo Nombre de Usuario:<br>
        <input type="text"name="nuevoNombreUsuario"value="{{old('nuevoNombreUsuario')}}{{$nuevoNombreUsuario}}">
        {!!$errors->first('nuevoNombreUsuario','<span class="error">:message</span>')!!}
        <label class="error">{{$nombreOcupado}}</label>
    </label>
    <br><br>
    <label>Nueva Contraseña:<br>
        <input type="password"name="nuevaContraseña"value="{{old('nuevaContraseña')}}{{$nuevaContraseña}}">
        {!!$errors->first('nuevaContraseña','<span class="error">:message</span>')!!}
        <label class="error">{{$contraseñaInvalida}}</label>
    </label>
    <br><br>
    <label>Privilegio:<br>
        <select name="privilegio">
            <option selected="true"disabled="disabled"value="seleccionar">Seleccionar</option>
            @if($viejoPrivilegio==1)
                <option value="1"selected="true">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            @elseif($viejoPrivilegio==2)
                <option value="1">1</option>
                <option value="2"selected="true">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            @elseif($viejoPrivilegio==3)
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3"selected="true">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            @elseif($viejoPrivilegio==4)
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4"selected="true">4</option>
                <option value="5">5</option>
            @else
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5"selected="true">5</option>
            @endif
        </select>
    </label>
    <br><br><br>
    <button class="botonRegular">CONFIRMAR</button>
    </form>
@endsection