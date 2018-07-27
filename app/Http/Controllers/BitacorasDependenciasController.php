<?php

namespace App\Http\Controllers;

use App\BitacoraDependencias;
use App\Dependencias;
use App\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BitacorasDependenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitacora = DB::table('bitacora_dependencias')->join('users','users.id','=','bitacora_dependencias.users_id')->select('bitacora_dependencias.bitacoraDependencias_id','bitacora_dependencias.nombreDependencias','bitacora_dependencias.codigoDependencias','bitacora_dependencias.action','bitacora_dependencias.id','users.name','bitacora_dependencias.created_at')->get()->sortByDesc('created_at');
        /*dd($bitacora);*/
        return view('dependencias.bitacora', compact('bitacora'));
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
    public function update(Request $request, $bitacoraDependencias_id)
    {
        $dependencias = Dependencias::find($bitacoraDependencias_id);
        /*$dependencias->action = $request->get('action');*/
        dd($dependencias);
        if ($request->get('action') == 'delete') {
            /*$dependencias = Dependencias::withTrashed()->where('id', '=', $bitacoraDependencias_id)->first();
            $dependencias->restore();*/
            echo "simon";
        }else{

            $dependencias = Dependencias::find($bitacoraDependencias_id);
           /* dd($dependencias);*/
             $dependencias->nombreDependencias = $request->get('nombreDependencias');
             $dependencias->codigoDependencias = $request->get('codigoDependencias');
             $dependencias->deleted_at = null;
            $dependencias->save();

            $bitacora = new BitacoraDependencias([
                'bitacoraDependencias_id' => $dependencias->id,
                'nombreDependencias' => $request->get('nombreDependencias'),
                'codigoDependencias' => $request->get('codigoDependencias'),
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $bitacora->save();
            $timeline = new Timeline([
                'tabla' => 'dependencia',
                'nombre' => $request->get('nombreDependencias'),
                'codigo' => $request->get('codigoDependencias'),
                'action' => 'recover',
                'users_id' => Auth::user()->id
            ]);
            $timeline->save();
        }


        return redirect('/bitacoraDependencias');
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
