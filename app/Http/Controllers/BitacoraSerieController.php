<?php

namespace App\Http\Controllers;

use App\Bitacora_series;
use App\Serie;
use App\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BitacoraSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacora = DB::table('bitacora_series')->join('users','users.id','=','bitacora_series.users_id')->select('*')->get();
        /*dd($bitacora);*/
        return view('series.bitacora', compact('bitacora'));
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
        //
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
    public function update(Request $request, $serie_id)
    {
        $serie = Serie::find($serie_id);
        if ($serie != null){
            $serie->dependencias_id = $request->get('dependencias_id');
            $serie->nombreSeries = $request->get('nombreSeries');
            $serie->codigoSeries = $request->get('codigoSeries');
            $serie->original = $request->get('original');
            $serie->copia = $request->get('copia');
            $serie->soporte = $request->get('soporte');
            $serie->gestion = $request->get('gestion');
            $serie->central = $request->get('central');
            $serie->ctfisico = $request->get('ctfisico');
            $serie->ctelectronico = $request->get('ctelectronico');
            $serie->microfilmacion = $request->get('microfilmacion');
            $serie->digitalizacion = $request->get('digitalizacion');
            $serie->seleccion = $request->get('seleccion');
            $serie->eliminacion = $request->get('eliminacion');
            $serie->deleted_at = null;
            $serie->save();

            $bitacora = new Bitacora_series([
                'serie_id' => $serie->id,
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
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $bitacora->save();

            $timeline = new Timeline([
                'tabla' => 'serie',
                'nombre' => $request->get('nombreSeries'),
                'codigo' => $request->get('codigoSeries'),
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $timeline->save();

            return redirect('/bitacoraSeries');
        }else{
            Serie::withTrashed()->find($serie_id)->restore();
            $serie = Serie::find($serie_id);

            $bitacora = new Bitacora_series([
                'serie_id' => $serie->id,
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
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $bitacora->save();

            $timeline = new Timeline([
                'tabla' => 'serie',
                'nombre' => $request->get('nombreSeries'),
                'codigo' => $request->get('codigoSeries'),
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $timeline->save();

            return redirect('/bitacoraSeries');
        }
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
