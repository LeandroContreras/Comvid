<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
Route::get('/inventario', 'InventarioController@index')->name('inventario.index');
Route::get('/persona', 'PersonaController@index')->name('persona.index');
Route::get('/contactos', 'ContactoController@index')->name('contactos.index');
Route::get('/contactos/create', 'ContactoController@create')->name('contactos.create');
Route::post('/contactos', 'ContactoController@store')->name('contactos.store');
Auth::routes();

Route::get('/vacaciones', 'AutorizacionController@vacaciones')->name('autorizaciones.vacaciones');

Auth::routes();

Route::get('/productos', 'ProductoController@index')->name('productos.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
