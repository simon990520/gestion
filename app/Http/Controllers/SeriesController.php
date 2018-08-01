<?php

namespace App\Http\Controllers;

use App\Bitacora_series;
use App\Dependencias;
use App\Http\Requests\SeriesRequest;
use App\Serie;
use App\Timeline;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = DB::table('series')->join('dependencias','dependencias.id', '=', 'series.dependencias_id')->select('series.id','series.nombreSeries','series.codigoSeries','series.original','series.copia','series.soporte','series.gestion','series.central','series.ctfisico','series.ctelectronico','series.microfilmacion','series.digitalizacion','series.seleccion','series.eliminacion','dependencias.nombreDependencias','dependencias.codigoDependencias')->whereNull('series.deleted_at')->whereNull('dependencias.deleted_at')->where('estado','!=','3')->get();
            /*dd($series);*/
        $dependencias = Dependencias::all()->toArray();
        /*$series = Serie::all()->toArray();*/
        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();


        return view('series.index', compact('dependencias','series','data'));
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
    public function store(SeriesRequest $request)
    {
        $gestion = $request->get('gestion');
        if ($gestion == '0'){
           echo 'simon';
           $estado = '2';
        }else{
            $estado = '1';
        }
        $series = new Serie([
            'dependencias_id' => $request->get('dependencias_id'),
            'nombreSeries' => $request->get('nombreSeries'),
            'codigoSeries' => $request->get('codigoSeries'),
            'original' => $request->get('original'),
            'copia' => $request->get('copia'),
            'soporte' => $request->get('soporte'),
            'gestion' => $request->get('gestion'),
            'central' => $request->get('central'),
            'ctfisico' => $request->get('ctfisico'),
            'ctelectronico' => $request->get('ctelectronico'),
            'microfilmacion' => $request->get('microfilmacion'),
            'digitalizacion' => $request->get('digitalizacion'),
            'seleccion' => $request->get('seleccion'),
            'eliminacion' => $request->get('eliminacion'),
            'estado' => $estado,
        ]);
        $series->save();
        $bitacora = new Bitacora_series([
            'serie_id' => $series->id,
            'dependencias_id' => $request->get('dependencias_id'),
            'nombreSeries' => $request->get('nombreSeries'),
            'codigoSeries' => $request->get('codigoSeries'),
            'original' => $request->get('original'),
            'copia' => $request->get('copia'),
            'soporte' => $request->get('soporte'),
            'gestion' => $request->get('gestion'),
            'central' => $request->get('central'),
            'ctfisico' => $request->get('ctfisico'),
            'ctelectronico' => $request->get('ctelectronico'),
            'microfilmacion' => $request->get('microfilmacion'),
            'digitalizacion' => $request->get('digitalizacion'),
            'seleccion' => $request->get('seleccion'),
            'eliminacion' => $request->get('eliminacion'),
            'action' => 'create',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();
        $dependencias_id = $request->get('dependencias_id');

        $timeline = new Timeline([
            'tabla' => 'serie',
            'nombre' => $request->get('nombreSeries'),
            'codigo' => $request->get('codigoSeries'),
            'action' => 'create',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();

        return redirect('/series');
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
        $seriess = DB::table('series')->join('dependencias','dependencias.id', '=', 'series.dependencias_id')->select('series.id','series.nombreSeries','series.codigoSeries','series.original','series.copia','series.soporte','series.gestion','series.central','series.ctfisico','series.ctelectronico','series.microfilmacion','series.digitalizacion','series.seleccion','series.eliminacion','dependencias.nombreDependencias','dependencias.codigoDependencias')->where('dependencias.deleted_at', '=', null)->where('estado','=','1')->get();
        $series = DB::table('series')->join('dependencias','dependencias.id', '=', 'series.dependencias_id')->select('series.id','series.nombreSeries','series.codigoSeries','series.original','series.copia','series.soporte','series.gestion','series.central','series.ctfisico','series.ctelectronico','series.microfilmacion','series.digitalizacion','series.seleccion','series.eliminacion','dependencias.nombreDependencias','dependencias.codigoDependencias','dependencias.id as depeid')->where('series.id', '=', $id)->get();
        $dependencias = Dependencias::all()->toArray();
        /*dd($series);*/
        return view('series.edit', compact('series','id','dependencias','seriess'));
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
        $gestion = $request->get('gestion');
        if ($gestion == '0'){
            echo 'simon';
            $estado = '2';
        }else{
            $estado = '1';
        }
        $series = Serie::find($id);
        $series->dependencias_id = $request->get('dependencias_id');
        $series->nombreSeries = $request->get('nombreSeries');
        $series->codigoSeries = $request->get('codigoSeries');
        $series->original = $request->get('original');
        $series->copia = $request->get('copia');
        $series->soporte = $request->get('soporte');
        $series->gestion = $request->get('gestion');
        $series->central = $request->get('central');
        $series->ctfisico = $request->get('ctfisico');
        $series->ctelectronico = $request->get('ctelectronico');
        $series->microfilmacion = $request->get('microfilmacion');
        $series->digitalizacion = $request->get('digitalizacion');
        $series->seleccion = $request->get('seleccion');
        $series->eliminacion = $request->get('eliminacion');
        $series->estado = $estado;
        $series->save();

        $bitacora = new Bitacora_series([
            'serie_id' => $series->id,
            'dependencias_id' => $request->get('dependencias_id'),
            'nombreSeries' => $request->get('nombreSeries'),
            'codigoSeries' => $request->get('codigoSeries'),
            'original' => $request->get('original'),
            'copia' => $request->get('copia'),
            'soporte' => $request->get('soporte'),
            'gestion' => $request->get('gestion'),
            'central' => $request->get('central'),
            'ctfisico' => $request->get('ctfisico'),
            'ctelectronico' => $request->get('ctelectronico'),
            'microfilmacion' => $request->get('microfilmacion'),
            'digitalizacion' => $request->get('digitalizacion'),
            'seleccion' => $request->get('seleccion'),
            'eliminacion' => $request->get('eliminacion'),
            'action' => 'update',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();

        $timeline = new Timeline([
            'tabla' => 'serie',
            'nombre' => $request->get('nombreSeries'),
            'codigo' => $request->get('codigoSeries'),
            'action' => 'update',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();

        return redirect('/series');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $series = Serie::find($id);
        /*dd($series);*/
        $bitacora = new Bitacora_series([
            'serie_id' => $series->id,
            'dependencias_id' => $series->dependencias_id,
            'nombreSeries' => $series->nombreSeries,
            'codigoSeries' => $series->codigoSeries,
            'original' => $series->original,
            'copia' => $series->copia,
            'soporte' => $series->soporte,
            'gestion' => $series->gestion,
            'central' => $series->central,
            'ctfisico' => $series->ctfisico,
            'ctelectronico' => $series->ctelectronico,
            'microfilmacion' => $series->microfilmacion,
            'digitalizacion' => $series->digitalizacion,
            'seleccion' => $series->seleccion,
            'eliminacion' => $series->eliminacion,
            'action' => 'delete',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();

        $timeline = new Timeline([
            'tabla' => 'serie',
            'nombre' => $series->nombreSeries,
            'codigo' => $series->codigoSeries,
            'action' => 'create',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();

        $series->delete();

        return redirect('/series');
    }
}
