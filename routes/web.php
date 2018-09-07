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

use App\Dependencias;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

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
    Route::resource('bitacoraSeries', 'BitacoraSerieController');
    Route::resource('bitacoraSubSeries', 'BitacoraSubController');
    Route::resource('store', 'StoreController');
    Route::resource('users', 'UserController');
    Route::resource('transferencias', 'TransferenciasController');
    Route::resource('central', 'CentralController');
    Route::resource('roles', 'RoleController');


    Route::get('/401', function () {
        return view('error.401');
    });

    //reportes

    Route::get('TranferenciasReporte', function () {
        $data = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.updated_at','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries')->whereNull('sub_series.deleted_at')->whereNull('series.deleted_at')->where('sub_series.estado','=','3')->get();
        /*dd($data);*/

        $pdf = PDF::loadView('reportes.transferencias', ['data'=> $data]);
        return $pdf->download('Transferencias.pdf');
    });
    Route::get('SunseriesReporte', function () {
        $data = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.created_at','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries')->whereNull('sub_series.deleted_at')->whereNull('series.deleted_at')->where('sub_series.estado','!=','3')->get();
        /*dd($data);*/

        $pdf = PDF::loadView('reportes.subseries', ['data'=> $data]);
        return $pdf->download('Subseries.pdf');
    });

    Route::get('DependenciasReporte', function () {
        $data = Dependencias::all()->toArray();
       /* dd($data);*/

        $pdf = PDF::loadView('reportes.dependencias', ['data'=> $data]);
        return $pdf->download('Dependencias.pdf');
    });
    Route::get('SeriesReporte', function () {
        $data = DB::table('series')->join('dependencias','dependencias.id', '=', 'series.dependencias_id')->select('series.id','series.nombreSeries','series.codigoSeries','series.original','series.copia','series.soporte','series.ctfisico','series.ctelectronico','series.microfilmacion','series.digitalizacion','series.seleccion','series.eliminacion','dependencias.nombreDependencias','dependencias.codigoDependencias','dependencias.created_at')->whereNull('series.deleted_at')->whereNull('dependencias.deleted_at')->get();

        /* dd($data);*/

        $pdf = PDF::loadView('reportes.series', ['data'=> $data]);
        return $pdf->download('Series.pdf');
    });


});

Auth::routes();


