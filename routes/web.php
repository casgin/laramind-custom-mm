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
	return redirect()->route('anagrafica-clienti.index');
});


Route::group(['prefix' => 'anagrafica-clienti'], function() {


	Route::get('/', 'AnagraficaClienteController@index')->name('anagraficaClienti.index');
	Route::get('/create', 'AnagraficaClienteController@create')->name('anagrafica-clienti.create');
	Route::post('/store', 'AnagraficaClienteController@store')->name('anagrafica-clienti.store');
	Route::get('/show/{id}', 'AnagraficaClienteController@show')->name('anagrafica-clienti.show')->where('id', '[0-9]+');

	Route::get('/update/{id}', 'AnagraficaClienteController@update')->name('anagrafica-clienti.update')->where('id', '[0-9]+');
	Route::post('/update/{id}', 'AnagraficaClienteController@updateApply')->name('anagrafica-clienti.updateApply')->where('id', '[0-9]+');
	Route::get('/delete/{id}', 'AnagraficaClienteController@delete')->name('anagrafica-clienti.delete')->where('id', '[0-9]+');


});