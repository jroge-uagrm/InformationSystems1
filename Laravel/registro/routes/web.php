<?php
//Para reiniciar primary key de persona
//DBCC CHECKIDENT (persona, RESEED,0);

Route::get('/','controlador@inicio');
Route::get('cursos','controlador@cursos');
Route::get('informacion','controlador@informacion');
Route::get('iniciarSesion','controlador@iniciarSesion');
Route::get('contactanos','controlador@contactanos');

//SECCION DE ALUMNOS
Route::get('cursosDisponibles','controladorCursos@cursosDisponibles');
Route::get('cursosTomados','controladorCursos@cursosTomados');
Route::get('miHorarioAlumno','controladorHorarios@miHorarioAlumno');
Route::get('pagos','controladorPagos@pagos');
Route::get('cerrarSesionAlumno','controladorAlumnos@cerrarSesionAlumno');

//SECCION DE DOCENTE
Route::get('misCursos','controladorCursos@misCursos');
Route::get('listasDeAlumnos','controladorAlumnos@listasDeAlumnos');
Route::get('miHorarioDocente','controladorHorarios@miHorarioDocente');
Route::get('cerrarSesionDocente','controladorDocentes@cerrarSesionDocente');

Route::get('usuarioTrabajador-personas','controladorPersonalAdministrativo@personas');
Route::get('usuarioTrabajador-registrarPersona','controladorPersonalAdministrativo@registrarPersona');
Route::get('usuarioTrabajador-cerrarSesion','controladorPersonalAdministrativo@cerrarSesion');
Route::get('usuarioTrabajador-usuarios','controladorPersonalAdministrativo@usuarios');
Route::get('usuarioTrabajador-usuarios-crear','controladorPersonalAdministrativo@crearUsuario');
Route::get('usuarioTrabajador-crearUsuario','controladorPersonalAdministrativo@crearUsuario');
Route::get('usuarioTrabajador-pagos','controladorPagos@pagos');

//VERIFICACIONES
Route::post('usuario','controlador@verificarInicioDeSesion');
Route::post('nuevoUsuario','controladorPersonalAdministrativo@verificarCreacionUsuario');

Route::post('registro','controlador@verificarRegistroDePersona');


/*Route::get('nuevoRegistro','controlador@registro');
Route::get('mostrarRegistros','controlador@registrados');
Route::get('EJ{parametro?}','controlador@parametroEjemplo');
Route::get('nuevaPersona','controlador@nuevaPersona');
Route::get('inicio','controlador@inicio');
Route::get('nuevoAlumno','controlador@nuevoAlumno');
Route::get('nuevoTrabajador','controlador@nuevoTrabajador');
Route::get('nuevoDocente','controlador@nuevoDocente');
Route::get('registrado','controlador@registrado');
/* Route::get('/EJ{parametro?}','controlador@parametroEjemplo')->where(
    'parametro',"[A-Za-z]+"
); */

// Route::get('a{parametro}',['as'=>'ejemplo',function($p){return $p;}]);