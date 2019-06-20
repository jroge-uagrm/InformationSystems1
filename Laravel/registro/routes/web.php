<?php
//Para reiniciar primary key de persona
//DBCC CHECKIDENT (persona, RESEED,0);

Route::get('/','controlador@iniciarSesion');

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

//SECCION DE TRABAJADORES
Route::get('usuarioTrabajador-personas','controladorPersonalAdministrativo@personas');
Route::get('usuarioTrabajador-personas-crear','controladorPersonalAdministrativo@crearPersona');
Route::get('usuarioTrabajador-personas-editar','controladorPersonalAdministrativo@editarPersona');
Route::get('usuarioTrabajador-personas-eliminar','controladorPersonalAdministrativo@eliminarPersona');

Route::get('usuarioTrabajador-usuarios','controladorPersonalAdministrativo@usuarios');
Route::get('usuarioTrabajador-usuarios-crear','controladorPersonalAdministrativo@crearUsuario');
Route::get('usuarioTrabajador-usuarios-editar','controladorPersonalAdministrativo@editarUsuario');
Route::get('usuarioTrabajador-usuarios-eliminar','controladorPersonalAdministrativo@eliminarUsuario');
Route::get('usuarioTrabajador-cerrarSesion','controladorPersonalAdministrativo@cerrarSesion');

//VERIFICACIONES
Route::post('usuario','controlador@verificarInicioDeSesion');
Route::post('nuevoUsuario','controladorPersonalAdministrativo@verificarCreacionUsuario');
Route::post('editarUsuario','controladorPersonalAdministrativo@verificarEdicionUsuario');
Route::post('confirmarCambios','controladorPersonalAdministrativo@verificarCambiosUsuario');
Route::post('nuevaPersona','controladorPersonalAdministrativo@verificarCreacionPersona');


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