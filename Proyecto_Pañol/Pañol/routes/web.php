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

Route::get('/', function () {
    return view('home');
});

Route::get('/401', function () {
    return view('errors/401');
});

Auth::routes();

Route::get('/inicio', 'HomeController@index'); 

// Route::get('/medicos', 'MedicoController@index');
// Route::get('/medicos/ingresar-medico', 'MedicoController@create');

// Route::get('/pacientes', 'PacienteController@index');
// Route::get('/pacientes/ingresar-paciente', 'PacienteController@create');

// Route::get('/usuarios', 'UserController@index');
// Route::get('/usuarios/ingresar-usuario', 'UserController@create');
// Route::get('/usuarios/roles', 'RoleController@index');
// Route::get('/usuarios/permisos', 'PermissionController@index');

//  Route::get('/atenciones/ingresar-atencion' ,'AtencionController@create');
//  Route::get('/atenciones', 'AtencionController@index');

// Route::resource('users', 'UserController');
// Route::resource('roles', 'RoleController');
// Route::resource('permissions', 'PermissionController');
// Route::resource('medicos', 'MedicoController');
// Route::resource('pacientes', 'PacienteController');
// Route::resource('atenciones', 'AtencionController');

// Route::get('/producto', function () {
//     return view('productos\create');
// });

// Route::get('/usuarios', function () {
//     return view('usuarios\create');
// });

// Route::get('/pedido', function () {
//     return view('pedidos\index');
// });
// Route::get('/pedido/create', function () {
//     return view('pedidos\create');
// });

// Route::get('/categoria/create', function () {
//     return view('categorias\create');
// });


Route::resource('usuarios', 'usuarioController');
Route::resource('categorias', 'categoriaController');
Route::resource('productos', 'productosController');

Route::resource('reportesPrestamos', 'solicitudController');
Route::resource('reportesStock', 'stockController');

