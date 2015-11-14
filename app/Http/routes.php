<?php

Route::resource('granja', 'GranjaController');
Route::resource('galpon', 'GalponController');
Route::resource('control', 'ControlController');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Admin
Route::get('admin',                 ['as' => 'admin',           'uses' => 'AdminController@index']);

//Route::get('admin/reporte',         ['as' => 'reporte',         'uses' =>  'AdminController@getReporte']);
//Route::post('admin/reporte',         ['as' => 'promedio',       'uses' =>  'AdminController@getPromedio']);

//Route::get('admin/ingreso-datos',   ['as' => 'ingreso_datos',   'uses' =>  'AdminController@getIngresoDatos']);
