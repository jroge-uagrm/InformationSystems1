<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/public/css/estilos.css" >
    <style>
    .error{
        color:red;
        font-size:10px;
    }
    </style>
    <title>Seccion-@yield('titulo')</title>
</head>
<body>
    <p class="importante">{{request()->url()}}</p>
    <p>{{ request()->is('/') ? 'Estas en Inicio':''}} </p>
    <h1>PAGINA DE REGISTRO DE PERSONAS</h1>
    @section('contenido')
    @show
    <br>
    <br>
    <a href="/">Inicio</a>
    <br>
    <a href="nuevoRegistro" class="{{ request()->is('/') ? 'importante':''}}">Nuevo Registro</a>
    <br>
    <a href="mostrarRegistros">Mostrar Registros</a>
</body>
</html>
