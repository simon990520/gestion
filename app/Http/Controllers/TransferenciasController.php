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
        /*dd($series);*/
        $sub_series = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries')->whereNull('sub_series.deleted_at')->whereNull('series.deleted_at')->where('sub_series.estado','!=','1')->where('sub_series.estado','!=','4')->get();
        $central = DB::table('centrals')->join('series','series.id', '=', 'centrals.serie_id')->select('centrals.id','centrals.nombreSubSeries','centrals.codigoSubSeries','centrals.originalSubSeries','centrals.copiaSubSeries','centrals.soporteSubSeries','centrals.gestionSubSeries','centrals.centralSubSeries','centrals.ctfisicoSubSeries','centrals.ctelectronicoSubSeries','centrals.microfilmacionSubSeries','centrals.digitalizacionSubSeries','centrals.estante','centrals.balda','centrals.caja','centrals.carpeta','centrals.seleccionSubSeries','centrals.eliminacionSubSeries','series.nombreSeries')->whereNull('series.deleted_at')->get();
        $recibir = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries','sub_series.estado','sub_series.updated_at','series.nombreSeries')->whereNull('sub_series.deleted_at')->whereNull('series.deleted_at')->where('sub_series.estado','=','3')->get();
        $dependencias = Dependencias::all()->toArray();
        /*$series = Serie::all()->toArray();*/

        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();

        /*dd($recibir);*/
        return view('transferencias.index', compact('series','id','dependencias','seriess','sub_series','recibir','central','data'));
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
        $series = SubSeries::find($id);
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
