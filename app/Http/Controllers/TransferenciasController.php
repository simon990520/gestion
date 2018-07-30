<?php

namespace App\Http\Controllers;

use App\Dependencias;
use App\Serie;
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
        $series = DB::table('series')->join('dependencias','dependencias.id', '=', 'series.dependencias_id')->select('series.id','series.nombreSeries','series.codigoSeries','series.original','series.copia','series.soporte','series.gestion','series.central','series.ctfisico','series.ctelectronico','series.microfilmacion','series.digitalizacion','series.seleccion','series.eliminacion','series.estado','dependencias.nombreDependencias','dependencias.codigoDependencias')->whereNull('series.deleted_at')->whereNull('dependencias.deleted_at')->where('estado','!=','1')->get();
        /*dd($series);*/
        $dependencias = Dependencias::all()->toArray();
        /*$series = Serie::all()->toArray();*/
        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();


        return view('transferencias.index', compact('series','id','dependencias','seriess'));
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
