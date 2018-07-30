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
    return view('auth.login');
});


Route::group(['middleware' => 'auth'], function() {

//Roles

    /*Route::post('roles/store', 'RoleController@store')->name('roles.store')->middleware('permission:roles.create');
    Route::get('roles', 'RoleController@index')->name('roles.index')->middleware('permission:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')->middleware('permission:roles.create');
    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')->middleware('permission:roles.edit');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')->middleware('permission:roles.show');
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')->middleware('permission:roles.edit');

    // dependencias
    Route::post('dependencias/store', 'DependenciasController@store')->name('dependencias.store')->middleware('permission:dependencias.create');
    Route::get('dependencias', 'DependenciasController@index')->name('dependencias.index')->middleware('permission:dependencias.index');
    Route::get('dependencias/create', 'DependenciasController@create')->name('dependencias.create')->middleware('permission:dependencias.create');
    Route::put('dependencias/{role}', 'DependenciasController@update')->name('dependencias.update')->middleware('permission:dependencias.edit');
    Route::get('dependencias/{role}', 'DependenciasController@show')->name('dependencias.show')->middleware('permission:dependencias.show');
    Route::delete('dependencias/{role}', 'DependenciasController@destroy')->name('dependencias.destroy')->middleware('permission:dependencias.destroy');
    Route::get('dependencias/{role}/edit', 'DependenciasController@edit')->name('dependencias.edit')->middleware('permission:dependencias.edit');
//Users

    Route::get('users', 'UserController@index')->name('users.index')->middleware('permission:users.index');
    Route::put('users/{role}', 'UserController@update')->name('users.update')->middleware('permission:users.edit');
    Route::get('users/{role}', 'UserController@show')->name('users.show')->middleware('permission:users.show');
    Route::delete('users/{role}', 'UserController@destroy')->name('users.destroy')->middleware('permission:users.destroy');
    Route::get('users/{role}/edit', 'UserController@edit')->name('users.edit')->middleware('permission:users.edit');*/
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('dependencias', 'DependenciasController');
    Route::resource('series', 'SeriesController');
    Route::resource('bitacoraDependencias', 'BitacoraDependenciasController');
    Route::resource('sub-series', 'SubSeriesController');
    Route::resource('bitacoraDependencias', 'BitacorasDependenciasController');
    Route::resource('store', 'StoreController');
    Route::resource('users', 'UserController');
    Route::resource('transferencias', 'TransferenciasController');

});

Auth::routes();


