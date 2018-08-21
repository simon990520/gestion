<?php

namespace App\Http\Controllers;

use App\Bitacora_series;
use App\BitacoraSubSeries;
use App\SubSeries;
use App\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BitacoraSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacora = DB::table('bitacora_sub_series')->join('users','users.id','=','bitacora_sub_series.users_id')->select('*')->get();
       /* dd($bitacora);*/
        return view('sub-series.bitacora', compact('bitacora'));
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
    public function update(Request $request, $Subserie_id)
    {
        $serie = SubSeries::find($Subserie_id);

        if ($serie != null){
            $serie->serie_id                 = $request->get('serie_id');
            $serie->nombreSubSeries          = $request->get('nombreSubSeries');
            $serie->codigoSubSeries          = $request->get('codigoSubSeries');
            $serie->originalSubSeries        = $request->get('originalSubSeries');
            $serie->copiaSubSeries           = $request->get('copiaSubSeries');
            $serie->soporteSubSeries         = $request->get('soporteSubSeries');
            $serie->gestionSubSeries         = $request->get('gestionSubSeries');
            $serie->centralSubSeries         = $request->get('centralSubSeries');
            $serie->ctfisicoSubSeries        = $request->get('ctfisicoSubSeries');
            $serie->ctelectronicoSubSeries   = $request->get('ctelectronicoSubSeries');
            $serie->microfilmacionSubSeries  = $request->get('microfilmacionSubSeries');
            $serie->digitalizacionSubSeries  = $request->get('digitalizacionSubSeries');
            $serie->seleccionSubSeries       = $request->get('seleccionSubSeries');
            $serie->eliminacionSubSeries     = $request->get('eliminacionSubSeries');
            $serie->deleted_at               = null;
            $serie->save();

            $bitacora = new BitacoraSubSeries(array(
                'Subserie_id'    => $serie->id,
                'serie_id'    => $request->get('serie_id'),
                'nombreSubSeries'    => $request->get('nombreSubSeries'),
                'codigoSubSeries'    => $request->get('codigoSubSeries'),
                'originalSubSeries'        => $request->get('originalSubSeries'),
                'copiaSubSeries'           => $request->get('copiaSubSeries'),
                'soporteSubSeries'         => $request->get('soporteSubSeries'),
                'gestionSubSeries'         => $request->get('gestionSubSeries'),
                'centralSubSeries'         => $request->get('centralSubSeries'),
                'ctfisicoSubSeries'        => $request->get('ctfisicoSubSeries'),
                'ctelectronicoSubSeries'   => $request->get('ctelectronicoSubSeries'),
                'microfilmacionSubSeries'  => $request->get('microfilmacionSubSeries'),
                'digitalizacionSubSeries'  => $request->get('digitalizacionSubSeries'),
                'seleccionSubSeries'       => $request->get('seleccionSubSeries'),
                'eliminacionSubSeries'     => $request->get('eliminacionSubSeries'),
                'action'          => 'recover',
                'users_id'        => Auth::user()->id
            ));
            $bitacora->save();

            $timeline = new Timeline([
                'tabla' => 'SubSeries',
                'nombre' => $request->get('nombreSubSeries'),
                'codigo' => $request->get('codigoSubSeries'),
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $timeline->save();

            return redirect('/bitacoraSubSeries');
        }else{
            SubSeries::withTrashed()->find($Subserie_id)->restore();
            $serie = SubSeries::find($Subserie_id);

            $bitacora = new Bitacora_series([
                '$Subserie_id'    => $serie->id,
                'Subserie_id'   => $request->get('Subserie_id'),
                'nombreSubSeries'    => $request->get('nombreSeries'),
                'codigoSubSeries'    => $request->get('codigoSeries'),
                'originalSubSeries'        => $request->get('original'),
                'copiaSubSeries'           => $request->get('copia'),
                'soporteSubSeries'         => $request->get('soporte'),
                'gestionSubSeries'         => $request->get('gestion'),
                'centralSubSeries'         => $request->get('central'),
                'ctfisicoSubSeries'        => $request->get('ctfisico'),
                'ctelectronicoSubSeries'   => $request->get('ctelectronico'),
                'microfilmacionSubSeries'  => $request->get('microfilmacion'),
                'digitalizacionSubSeries'  => $request->get('digitalizacion'),
                'seleccionSubSeries'       => $request->get('seleccion'),
                'eliminacionSubSeries'     => $request->get('eliminacion'),
                'action'          => 'recover',
                'users_id'        => Auth::user()->id
            ]);
            $bitacora->save();

            $timeline = new Timeline([
                'tabla' => 'SubSeries',
                'nombre' => $request->get('nombreSubSeries'),
                'codigo' => $request->get('codigoSubSeries'),
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $timeline->save();

            return redirect('/bitacoraSubSeries');
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
