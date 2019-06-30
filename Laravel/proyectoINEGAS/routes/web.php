<?php
//Para reiniciar un identity en SQLServer
//DBCC CHECKIDENT(nombreDeLaClase,RESEED,0);

Route::get('/','controlador@iniciarSesion');

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
Route::post('confirmarCambiosUsuario','controladorPersonalAdministrativo@verificarCambiosUsuario');
Route::post('nuevaPersona','controladorPersonalAdministrativo@verificarCreacionPersona');
Route::post('editarPersona','controladorPersonalAdministrativo@verificarEdicionPersona');

















