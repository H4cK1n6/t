<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');
/* Route::get('/documentacion', 'DocController@index')->name('documentacion'); */
Route::get('/documentacion','DocController@index');

Route::get('bootstrap-4', function(){
    return view('pages.bootstrap-4');
});

Route::get('ui/general', function(){
    return view('pages.ui-general');
});

Route::get('form/elements', function(){
    return view('pages.form-elements');
});
