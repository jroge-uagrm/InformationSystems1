<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','controlador@inicio');
Route::get('cursos','controlador@cursos');
Route::get('informacion','controlador@informacion');
Route::get('iniciarSesion','controlador@iniciarSesion');
Route::get('contactanos','controlador@contactanos');

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
Route::get('{parametro}',['as'=>'ejemplo',function($p){return $p;}]);
Route::post('registro','controlador@registrar');
