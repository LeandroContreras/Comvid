<?php

use App\Http\Controllers\CategoriasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Block\Element\IndentedCode;
use SebastianBergmann\CodeCoverage\Node\CrapIndex;
use App\Http\Controllers\UsuarioController;

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

Route::get('/usuario', 'UsuarioController@index')->name('usuario.index');
Route::get('/usuario/{usuario}','UsuarioController@show')->name('usuario.show');
Route::get('/usuario/{usuario}/edit', 'UsuarioController@edit')->name('usuario.edit');
Route::put('/usuario/{usuario}', 'UsuarioController@update')->name('usuario.update');





#Inventario
Route::get('/inventario', 'InventarioController@index')->name('inventario.index');

#Categorias
Route::get('/categoria', 'CategoriasController@index')->name('categoria.index');
Route::get('/categoria/create', 'CategoriasController@create')->name('categoria.create');
Route::post('categoria', 'CategoriasController@store')->name('categoria.store');

#Item
Route::get('/item', 'ItemController@index')->name('item.index');
Route::get('/item/create', 'ItemController@create')->name('item.create');
Route::post('/item', 'ItemController@store')->name('item.store');

#Persona
Route::get('/persona', 'PersonaController@index')->name('persona.index');

#Contacto
Route::get('/contactos', 'ContactoController@index')->name('contactos.index');
Route::get('/contactos/create', 'ContactoController@create')->name('contactos.create');
Route::post('/contactos', 'ContactoController@store')->name('contactos.store');

#Ventas
Route::get('/ventas', 'VentasController@index')->name('ventas.index');
Route::get('/ventas/create', 'VentasController@create')->name('ventas.create');

Auth::routes();


Auth::routes();

Route::get('/productos', 'ProductoController@index')->name('productos.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
