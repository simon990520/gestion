<?php

namespace App\Http\Controllers;

use App\BitacoraSubSeries;
use App\Serie;
use App\Store;
use App\SubSeries;
use App\Timeline;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubSeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_series = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries')->whereNull('sub_series.deleted_at')->whereNull('series.deleted_at')->where('sub_series.estado','!=','3')->get();
        $series = DB::table('series')->join('dependencias','dependencias.id', '=', 'series.dependencias_id')->select('series.id','series.nombreSeries','series.codigoSeries','series.original','series.copia','series.soporte','series.gestion','series.central','series.ctfisico','series.ctelectronico','series.microfilmacion','series.digitalizacion','series.seleccion','series.eliminacion','dependencias.nombreDependencias','dependencias.codigoDependencias')->whereNull('series.deleted_at')->whereNull('dependencias.deleted_at')->get();
       /*dd($sub_series);*/
        return view('sub-series.index', compact('series','sub_series'));
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
    public function store(Request $request)
    {
        $gestion = $request->get('gestionSubSeries');
        if ($gestion == '0'){
            $estado = '2';
        }else{
            $estado = '1';
        }

        $sub_series = new SubSeries([
            'serie_id' => $request->get('serie_id'),
            'nombreSubSeries' => $request->get('nombreSubSeries'),
            'codigoSubSeries' => $request->get('codigoSubSeries'),
            'originalSubSeries' => $request->get('originalSubSeries'),
            'copiaSubSeries' => $request->get('copiaSubSeries'),
            'soporteSubSeries' => $request->get('soporteSubSeries'),
            'gestionSubSeries' => $request->get('gestionSubSeries'),
            'centralSubSeries' => $request->get('centralSubSeries'),
            'ctfisicoSubSeries' => $request->get('ctfisicoSubSeries'),
            'ctelectronicoSubSeries' => $request->get('ctelectronicoSubSeries'),
            'microfilmacionSubSeries' => $request->get('microfilmacionSubSeries'),
            'digitalizacionSubSeries' => $request->get('digitalizacionSubSeries'),
            'seleccionSubSeries' => $request->get('seleccionSubSeries'),
            'eliminacionSubSeries' => $request->get('eliminacionSubSeries'),
            'estado' => $estado,
        ]);

        $sub_series->save();
        $bitacora = new BitacoraSubSeries([
            'Subserie_id' => $sub_series->id,
            'serie_id' => $request->get('serie_id'),
            'nombreSubSeries' => $request->get('nombreSubSeries'),
            'codigoSubSeries' => $request->get('codigoSubSeries'),
            'originalSubSeries' => $request->get('originalSubSeries'),
            'copiaSubSeries' => $request->get('copiaSubSeries'),
            'soporteSubSeries' => $request->get('soporteSubSeries'),
            'gestionSubSeries' => $request->get('gestionSubSeries'),
            'centralSubSeries' => $request->get('centralSubSeries'),
            'ctfisicoSubSeries' => $request->get('ctfisicoSubSeries'),
            'ctelectronicoSubSeries' => $request->get('ctelectronicoSubSeries'),
            'microfilmacionSubSeries' => $request->get('microfilmacionSubSeries'),
            'digitalizacionSubSeries' => $request->get('digitalizacionSubSeries'),
            'seleccionSubSeries' => $request->get('seleccionSubSeries'),
            'eliminacionSubSeries' => $request->get('eliminacionSubSeries'),
            'action' => 'create',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();

        $timeline = new Timeline([
            'tabla' => 'Subserie',
            'nombre' => $request->get('nombreSubSeries'),
            'codigo' => $request->get('codigoSubSeries'),
            'action' => 'create',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();
        return redirect('sub-series');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = SubSeries::find($id);
        $data = DB::table('stores')->select('*')->where('Subserie_id', '=', $id)->get();
        $last = $data->last();
        $now = new \DateTime();
/*dd($post);*/
        return view('store.index', compact('post','data', 'last','now'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Subseriess = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries','series.codigoSeries')->where('series.deleted_at', '=', null)->where('sub_series.estado','!=','3')->get();
        $Subseries = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries', 'series.nombreSeries','series.codigoSeries','series.id as seid')->where('sub_series.id', '=', $id)->get();
        $series = Serie::all()->toArray();
        return view('sub-series.edit', compact('Subseries','id','series','Subseriess'));
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
        $gestion = $request->get('gestionSubSeries');
        if ($gestion == '0'){
            $estado = '2';
        }else{
            $estado = '1';
        }

        $Subseries = SubSeries::find($id);
        $Subseries->serie_id = $request->get('serie_id');
        $Subseries->nombreSubSeries = $request->get('nombreSubSeries');
        $Subseries->codigoSubSeries = $request->get('codigoSubSeries');
        $Subseries->originalSubSeries = $request->get('originalSubSeries');
        $Subseries->copiaSubSeries = $request->get('copiaSubSeries');
        $Subseries->soporteSubSeries = $request->get('soporteSubSeries');
        $Subseries->gestionSubSeries = $request->get('gestionSubSeries');
        $Subseries->centralSubSeries = $request->get('centralSubSeries');
        $Subseries->ctfisicoSubSeries = $request->get('ctfisicoSubSeries');
        $Subseries->ctelectronicoSubSeries = $request->get('ctelectronicoSubSeries');
        $Subseries->microfilmacionSubSeries = $request->get('microfilmacionSubSeries');
        $Subseries->digitalizacionSubSeries = $request->get('digitalizacionSubSeries');
        $Subseries->seleccionSubSeries = $request->get('seleccionSubSeries');
        $Subseries->eliminacionSubSeries = $request->get('eliminacionSubSeries');
        $Subseries->estado = $estado;
        $Subseries->save();

        $bitacora = new BitacoraSubSeries([
            'Subserie_id' => $Subseries->id,
            'serie_id' => $request->get('serie_id'),
            'nombreSubSeries' => $request->get('nombreSubSeries'),
            'codigoSubSeries' => $request->get('codigoSubSeries'),
            'originalSubSeries' => $request->get('originalSubSeries'),
            'copiaSubSeries' => $request->get('copiaSubSeries'),
            'soporteSubSeries' => $request->get('soporteSubSeries'),
            'gestionSubSeries' => $request->get('gestionSubSeries'),
            'centralSubSeries' => $request->get('centralSubSeries'),
            'ctfisicoSubSeries' => $request->get('ctfisicoSubSeries'),
            'ctelectronicoSubSeries' => $request->get('ctelectronicoSubSeries'),
            'microfilmacionSubSeries' => $request->get('microfilmacionSubSeries'),
            'digitalizacionSubSeries' => $request->get('digitalizacionSubSeries'),
            'seleccionSubSeries' => $request->get('seleccionSubSeries'),
            'eliminacionSubSeries' => $request->get('eliminacionSubSeries'),
            'action' => 'update',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();


        $timeline = new Timeline([
            'tabla' => 'Subserie',
            'nombre' => $request->get('nombreSubSeries'),
            'codigo' => $request->get('codigoSubSeries'),
            'action' => 'update',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();
        return redirect('/sub-series');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $Subseries = SubSeries::find($id);
        $bitacora = new BitacoraSubSeries([
            'Subserie_id' => $Subseries->id,
            'serie_id' => $Subseries->serie_id,
            'nombreSubSeries' => $Subseries->nombreSubSeries,
            'codigoSubSeries' => $Subseries->codigoSubSeries,
            'originalSubSeries' => $Subseries->originalSubSeries,
            'copiaSubSeries' => $Subseries->copiaSubSeries,
            'soporteSubSeries' => $Subseries->soporteSubSeries,
            'gestionSubSeries' => $Subseries->gestionSubSeries,
            'centralSubSeries' => $Subseries->centralSubSeries,
            'ctfisicoSubSeries' => $Subseries->ctfisicoSubSeries,
            'ctelectronicoSubSeries' => $Subseries->ctelectronicoSubSeries,
            'microfilmacionSubSeries' => $Subseries->microfilmacionSubSeries,
            'digitalizacionSubSeries' => $Subseries->digitalizacionSubSeries,
            'seleccionSubSeries' => $Subseries->seleccionSubSeries,
            'eliminacionSubSeries' => $Subseries->eliminacionSubSeries,
            'action' => 'delete',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();


        $timeline = new Timeline([
            'tabla' => 'serie',
            'nombre' => $Subseries->nombreSubSeries,
            'codigo' => $Subseries->codigoSubSeries,
            'action' => 'delete',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();
        $timeline->save();

        $Subseries->delete();
        return redirect('/sub-series');
    }
}
