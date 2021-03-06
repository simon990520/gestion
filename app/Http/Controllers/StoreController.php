<?php

namespace App\Http\Controllers;

use App\archivo;
use App\Store;
use App\SubSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Knp\Snappy\Pdf;
use setasign\Fpdi\Fpdi;
use function Sodium\compare;

/*require_once('vendor/fpdf/fpdf.php');
require_once('vendor/fpdi/src/autoload.php');*/


class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*store = SubSeries::all()->toArray();
        $post = SubSeries::find($store->Subserie_id);

        $data = DB::table('stores')->select('*')->where('Subserie_id', '=', $store->Subserie_id)->get();
        return view('store.index', compact('store','data','post'));*/
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


        $store = new Store([
            'nombre' => $request->get('nombre'),
            'asunto' => $request->get('asunto'),
            'fecha' => $request->get('fecha'),
            'radicado' => $request->get('radicado'),
            'unidad' => $request->get('unidad'),
            'Subserie_id' => $request->get('Subserie_id'),
        ]);


        $store->save();
        $post = SubSeries::find($store->Subserie_id);

        $data = DB::table('stores')->select('*')->where('Subserie_id', '=', $store->Subserie_id)->get();
        return redirect()->action(
            'SubSeriesController@show', $store->Subserie_id
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archivos = DB::table('archivos')
            ->select(DB::raw('*'))
            ->where('stores_id', '=', $id)
            ->get();

        /*$archivos = DB::table('archivos')
            ->join('stores', 'stores.id', '=', 'archivos.stores_id')
            ->select('archivos.*', 'stores.radicado')
            ->get();*/

        $title = Store::find($id);
        /*dd($archivos);*/

        /*$pdf = new Fpdi();
        foreach ($archivos as $post){

        }*/

        return view('archivo.index', compact('id','archivos','title'));
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
        $series = Store::find($id);
        $series->delete();

        return redirect()->action(
            'SubSeriesController@show', $series->Subserie_id
        );
    }
}
