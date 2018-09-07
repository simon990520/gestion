<?php

namespace App\Http\Controllers;

use App\Central;
use App\Serie;
use App\SubSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CentralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id');

        $data = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.serie_id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries')->where('sub_series.id','=',$id)->get();
        echo $data[0]->serie_id;

        $recibir = new Central([
            'serie_id' => $data[0]->serie_id,
            'nombreSubSeries' => $data[0]->nombreSubSeries,
            'codigoSubSeries' => $data[0]->codigoSubSeries,
            'originalSubSeries' => $data[0]->originalSubSeries,
            'copiaSubSeries' => $data[0]->copiaSubSeries,
            'soporteSubSeries' => $data[0]->soporteSubSeries,
            'gestionSubSeries' => $data[0]->gestionSubSeries,
            'centralSubSeries' => $data[0]->centralSubSeries,
            'ctfisicoSubSeries' => $data[0]->ctfisicoSubSeries,
            'ctelectronicoSubSeries' => $data[0]->ctelectronicoSubSeries,
            'microfilmacionSubSeries' => $data[0]->microfilmacionSubSeries,
            'digitalizacionSubSeries' => $data[0]->digitalizacionSubSeries,
            'seleccionSubSeries' => $data[0]->seleccionSubSeries,
            'eliminacionSubSeries' => $data[0]->eliminacionSubSeries,
            'estante' => $request->get('estante'),
            'balda' => $request->get('balda'),
            'caja' => $request->get('caja'),
            'carpeta' => $request->get('carpeta'),
        ]);
        $recibir->save();

        $series = SubSeries::find($id);
        /*dd($series);*/
        $series->estado = '4';
        $series->save();
        return redirect('/transferencias');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('sub_series')->join('series','series.id', '=', 'sub_series.serie_id')->select('sub_series.id','sub_series.nombreSubSeries','sub_series.codigoSubSeries','sub_series.originalSubSeries','sub_series.copiaSubSeries','sub_series.soporteSubSeries','sub_series.gestionSubSeries','sub_series.centralSubSeries','sub_series.ctfisicoSubSeries','sub_series.ctelectronicoSubSeries','sub_series.microfilmacionSubSeries','sub_series.digitalizacionSubSeries','sub_series.seleccionSubSeries','sub_series.eliminacionSubSeries','sub_series.estado','series.nombreSeries')->where('sub_series.id','=',$id)->get();

        /*dd($data);*/


        return view('transferencias.recibir', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('centrals')->join('series','series.id', '=', 'centrals.serie_id')->select('centrals.id','centrals.nombreSubSeries','centrals.codigoSubSeries','centrals.originalSubSeries','centrals.copiaSubSeries','centrals.soporteSubSeries','centrals.estante','centrals.balda','centrals.caja','centrals.carpeta','centrals.gestionSubSeries','centrals.centralSubSeries','centrals.ctfisicoSubSeries','centrals.ctelectronicoSubSeries','centrals.microfilmacionSubSeries','centrals.digitalizacionSubSeries','centrals.seleccionSubSeries','centrals.eliminacionSubSeries','series.nombreSeries')->whereNull('series.deleted_at')->get();
        /*dd($data);*/
        return view('transferencias.edit', compact('data','id'));

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
        if (isset($_REQUEST['update'])){
            $central = Central::find($id);
            $central->estante = $request->get('estante');
            $central->balda = $request->get('balda');
            $central->caja = $request->get('caja');
            $central->carpeta = $request->get('carpeta');
            $central->save();
            return redirect('/transferencias');
        }else{
            $series = SubSeries::find($id);
            $series->estado = '2';
            $series->save();
            return redirect('/transferencias');
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
        $central = Central::find($id);
        $central->delete();
        return redirect('transferencias');
    }
}
