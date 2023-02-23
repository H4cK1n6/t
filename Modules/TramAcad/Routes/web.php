<?php

use Illuminate\Support\Facades\Route;
use Modules\TramAcad\Http\Controllers\SolicitudController;

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

Route::prefix('TramAcad')->group(function() {
    Route::get('/', 'TramAcadController@index');
    //Route::get('solicitudes', 'SolicitudController@index')->name('solicitudes');
});

Route::get('/formularios', function () {
    return view('formularios.index');
})->name('botones');

Route::get('solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
Route::get('solicitudesu', [SolicitudController::class, 'show'])->name('solicitudesUsuario');

/* Route::get('/formularios/solicitar', function () {
    return view('SolicitudController@seleccionarTramite');
})->name('formularios.solicitar'); */

Route::get('/formularios', 'SolicitudController@seleccionarTramite')->name('formularios.solicitar');
Route::post('/formularios', 'SolicitudController@store')->name('formularios.store');

Route::post('/guardar-item-seleccionado', 'SolicitudController@guardarItemSeleccionado')->name('guardar-item-seleccionado');


Route::get('/formularios/verificar', function () {
    return view('tramacad::formularios.verificar');
})->name('formularios.verificar');
