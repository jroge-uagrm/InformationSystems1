@extends($extend)
@section('mostrar')
    @foreach ($personas as $persona)
        <p> Nombre(s): {{$persona->nombre}}<br>
            Apellidos: {{$persona->apellidoPaterno}} {{$persona->apellidoMaterno}}<br>        
            CI       : {{$persona->ci}}<br>
            Telefono : {{$persona->telefono}}<br>
            Correo   : {{$persona->correo}}<br>
            Fecha Nac: {{$persona->fechaNacimiento}}
        </p>
        <br>
    @endforeach
@endsection