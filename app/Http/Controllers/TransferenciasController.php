<?php

namespace App\Http\Controllers;

use App\Dependencias;
use App\Serie;
use App\SubSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = DB::table('series')->join('dependencias','dependencias.id', '=', 'series.dependencias_id')->select('series.id','series.nombreSeries','series.codigoSeries','series.original','series.copia','series.soporte','series.gestion','series.central','series.ctfisico','series.ctelectronico','series.microfilmacion','series.digitalizacion','series.seleccion','series.eliminacion','series.estado','dependencias.nombreDependencias','dependencias.codigoDependencias')->whereNull('series.deleted_at')->whereNull('dependencias.deleted_at')->where('series.estado','!=','1')->get();
        /*dd($series);*/
        $sub_series = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries')->whereNull('sub_series.deleted_at')->whereNull('series.deleted_at')->where('sub_series.estado','!=','1')->get();
        $dependencias = Dependencias::all()->toArray();
        /*$series = Serie::all()->toArray();*/

        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();


        return view('transferencias.index', compact('series','id','dependencias','seriess','sub_series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request  )
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $series = Serie::find($id);
        /*dd($series);*/
        $series->estado = '3';
        $series->save();
        return redirect('/transferencias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
