<?php

use App\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriasController;
use League\CommonMark\Block\Element\IndentedCode;
use SebastianBergmann\CodeCoverage\Node\CrapIndex;

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
    return view('welcome');
});
Auth::routes();
// rutas a las que solo los usuarios con el rol "Administrador" pueden acceder
Route::get('/notificacion', 'NotificacionController@index')->middleware('can:notificacion.index')->name('notificacion.index');




Route::get('/registro', 'RegistroController@showRegistrationForm')->middleware('can:register')->name('register');
Route::post('/registro', 'RegistroController@register')->middleware('can:register')->name('register.submit');

Route::get('/usuario', 'UsuarioController@index')->middleware('can:usuario.index')->name('usuario.index');
Route::get('/usuario/{usuario}','UsuarioController@show')->middleware('can:usuario.index')->name('usuario.show');
Route::get('/usuario/{usuario}/edit', 'UsuarioController@edit')->middleware('can:usuario.index')->name('usuario.edit');
Route::get('/usuario/{id}/editarus', 'UsuarioController@editarus')->middleware('can:usuario.index')->name('usuario.editarus');
Route::put('/usuario/{usuario}', 'UsuarioController@update')->middleware('can:usuario.index')->name('usuario.update');
Route::put('/usuario/{id}/updateus', 'UsuarioController@updateus')->middleware('can:usuario.index')->name('usuario.updateus');

#Inventario
Route::get('/inventario', 'InventarioController@index')->name('inventario.index');
Route::get('/inventario/reporte', 'InventarioController@reporte')->name('inventario.reporte');
Route::get('/inventario/reportepdf', 'InventarioController@reportepdf')->name('inventario.reportepdf');
Route::get('/inventario/reportexcel','InventarioController@reporteexcel')->name('inventario.reporteexcel');
Route::get('/inventario/exportarexcel','InventarioController@exportarexcel')->name('inventario.exportarexcel');


#Categorias
Route::get('/categoria', 'CategoriasController@index')->name('categoria.index');
Route::get('/categoria/create', 'CategoriasController@create')->name('categoria.create');
Route::post('categoria', 'CategoriasController@store')->name('categoria.store');

#Item
Route::get('/item', 'ItemController@index')->name('item.index');
Route::get('/item/create', 'ItemController@create')->middleware('can:item.create')->name('item.create');
Route::post('/item', 'ItemController@store')->name('item.store');
Route::get('/item/{id}/edit', 'ItemController@edit')->name('item.edit');
Route::put('/item/{id}', 'ItemController@update')->name('item.update');

#Persona
Route::get('/persona', 'PersonaController@index')->name('persona.index');

#Contacto
Route::get('/contactos', 'ContactoController@index')->name('contactos.index');
Route::get('/contactos/create', 'ContactoController@create')->name('contactos.create');
Route::post('/contactos', 'ContactoController@store')->name('contactos.store');

#Ventas
Route::get('/ventas', 'VentasController@index')->name('ventas.index');
Route::get('/ventas/create', 'VentasController@create')->name('ventas.create');
Route::post('/ventas', 'VentasController@store')->name('ventas.store');

Auth::routes();


Auth::routes();

Route::get('/productos', 'ProductoController@index')->name('productos.index');

Auth::routes();

Route::get('/home', 'InventarioController@index')->name('inventario.index');
