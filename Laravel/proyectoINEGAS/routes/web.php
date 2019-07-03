<?php
//Para reiniciar un identity en SQLServer
//DBCC CHECKIDENT(nombreDeLaClase,RESEED,0);

Route::get('/','controlador@iniciarSesion');

Route::get('usuarioTrabajador-personas','controladorPersonas@personas');
Route::get('usuarioTrabajador-personas-crear','controladorPersonas@crear');
Route::get('usuarioTrabajador-personas-editar','controladorPersonas@editar');
Route::get('usuarioTrabajador-personas-eliminar','controladorPersonas@eliminar');
Route::get('usuarioTrabajador-alumnos','controladorAlumnos@alumnos');
Route::get('usuarioTrabajador-alumnos-crear','controladorAlumnos@crear');
Route::get('usuarioTrabajador-alumnos-editar','controladorAlumnos@editar');
Route::get('usuarioTrabajador-alumnos-eliminar','controladorAlumnos@eliminar');
Route::get('usuarioTrabajador-usuarios','controladorUsuarios@usuarios');
Route::get('usuarioTrabajador-usuarios-crear','controladorUsuarios@crear');
Route::get('usuarioTrabajador-usuarios-editar','controladorUsuarios@editar');
Route::get('usuarioTrabajador-usuarios-eliminar','controladorUsuarios@eliminar');

Route::get('usuarioTrabajador-cerrarSesion','controladorPersonalAdministrativo@cerrarSesion');


//---------------------------VERIFICACIONES-------------------------------------
Route::post('usuario','controlador@verificarInicioDeSesion');

Route::post('nuevaPersona','controladorPersonas@verificarCreacionPersona');
Route::post('editarPersona','controladorPersonas@verificarEdicionPersona');
Route::post('verificarCambiosPersona','controladorPersonas@verificarCambiosPersona');
Route::post('eliminarPersona','controladorPersonas@verificarEliminacionPersona');
Route::post('nuevoAlumno','controladorAlumnos@verificarCreacionAlumno');
Route::post('editarAlumno','controladorAlumnos@verificarEdicionAlumno');
Route::post('eliminarAlumno','controladorAlumnos@verificarEliminacionAlumno');
Route::post('nuevoUsuario','controladorUsuarios@verificarCreacionUsuario');
Route::post('editarUsuario','controladorUsuarios@verificarEdicionUsuario');
Route::post('confirmarCambiosUsuario','controladorUsuarios@verificarCambiosUsuario');

















