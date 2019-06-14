<?php
Route::get('/','controlador@inicio');
Route::get('cursos','controlador@cursos');
Route::get('informacion','controlador@informacion');
Route::get('iniciarSesion','controlador@iniciarSesion');
Route::get('contactanos','controlador@contactanos');

//SECCION DE ALUMNO
Route::get('cursosDisponibles','controlador@cursosDisponibles');
Route::get('cursosTomados','controlador@cursosTomados');
Route::get('miHorarioAlumno','controlador@miHorarioAlumno');
Route::get('pagos','controlador@pagos');
Route::get('cerrarSesionAlumno','controlador@cerrarSesionAlumno');

//SECCION DE DOCENTE
Route::get('misCursos','controlador@misCursos');
Route::get('listasDeAlumnos','controlador@listasDeAlumnos');
Route::get('miHorarioDocente','controlador@miHorarioDocente');
Route::get('otros','controlador@otros');
Route::get('cerrarSesionDocente','controlador@cerrarSesionDocente');

//SECCION DE TRABAJADOR
Route::get('registrarPersona','controlador@registrarPersona');
Route::get('cerrarSesionTrabajador','controlador@cerrarSesionTrabajador');

//VERIFCACIONES
Route::post('usuario','controlador@verificarInicioDeSesion');
Route::post('registro');


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
Route::post('registro','controlador@registrar');
//Automatico
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');