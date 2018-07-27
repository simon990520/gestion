<?php

namespace App\Http\Controllers;

use App\BitacoraDependencias;
use App\Dependencias;
use App\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DependenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = Dependencias::all()->toArray();
        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();
    /*dd($data);*/
        return view('dependencias.index', compact('dependencias','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencias = Dependencias::all()->toArray();
        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();


        return view('dependencias.index', compact('dependencias','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // guardar en la tabla dependencias
        $dependencias = new Dependencias([
            'nombreDependencias' => $request->get('nombreDependencias'),
            'codigoDependencias' => $request->get('codigoDependencias')
        ]);


        $dependencias->save();
        //guardar la bitacora de la creeacion del registro
        /*dd($dependencias->id);*/

        $bitacora = new BitacoraDependencias([
            'bitacoraDependencias_id' => $dependencias->id,
            'nombreDependencias' => $request->get('nombreDependencias'),
            'codigoDependencias' => $request->get('codigoDependencias'),
            'action' => 'create',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();

        $timeline = new Timeline([
            'tabla' => 'dependencia',
            'nombre' => $request->get('nombreDependencias'),
            'codigo' => $request->get('codigoDependencias'),
            'action' => 'create',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();

        return redirect('/dependencias/create');
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
        $did = Dependencias::find($id);
        $dependencias = Dependencias::all()->toArray();
        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();


        return view('dependencias.edit', compact('did','id','dependencias','data'));
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
        $dependencias = Dependencias::find($id);
        $dependencias->nombreDependencias = $request->get('nombreDependencias');
        $dependencias->codigoDependencias = $request->get('codigoDependencias');
        $dependencias->save();

        //guardar bitacora
        $bitacora = new BitacoraDependencias([
            'bitacoraDependencias_id' => $dependencias->id,
            'nombreDependencias' => $request->get('nombreDependencias'),
            'codigoDependencias' => $request->get('codigoDependencias'),
            'action' => 'update',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();
        $timeline = new Timeline([
            'tabla' => 'dependencia',
            'nombre' => $request->get('nombreDependencias'),
            'codigo' => $request->get('codigoDependencias'),
            'action' => 'update',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();
        return redirect('/dependencias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // bitacora de eliminacion

        $dependencias = Dependencias::find($id);

        $bitacora = new BitacoraDependencias([
            'bitacoraDependencias_id' => $dependencias->id,
            'nombreDependencias' => $dependencias->nombreDependencias,
            'codigoDependencias' => $dependencias->codigoDependencias,
            'action' => 'delete',
            'users_id' => Auth::user()->id
        ]);
        $bitacora->save();

        $timeline = new Timeline([
            'tabla' => 'dependencia',
            'nombre' => $dependencias->nombreDependencias,
            'codigo' => $dependencias->codigoDependencias,
            'action' => 'delete',
            'users_id' => Auth::user()->id
        ]);
        $timeline->save();
        $dependencias->delete();


        return redirect('/dependencias');
    }
}
