<?php

namespace App\Http\Controllers;

use App\Permisos;
use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->get();
        $permisos = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();

        /*dd($data);*/
        return view('users.users', compact('data','permisos'));
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    public function store(Request $request)
    {
        $users = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        $users->save();
        $permisos = new Permisos([
            'ndependencias' => $request->get('ndependencias'),
            'cdependencias' => $request->get('cdependencias'),
            'edependencias' => $request->get('edependencias'),
            'ddependencias' => $request->get('ddependencias'),
            'nseries' => $request->get('nseries'),
            'cseries' => $request->get('cseries'),
            'eseries' => $request->get('eseries'),
            'dseries' => $request->get('dseries'),
            'nsubseries' => $request->get('nsubseries'),
            'csubseries' => $request->get('csubseries'),
            'esubseries' => $request->get('esubseries'),
            'dsubseries' => $request->get('dsubseries'),
            'nusuarios' => $request->get('nusuarios'),
            'cusuarios' => $request->get('cusuarios'),
            'eusuarios' => $request->get('eusuarios'),
            'dusuarios' => $request->get('dusuarios'),
            'user_id' => $users->id

        ]);
        $permisos->save();
        return redirect('/users');
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
        $data = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->get();
        $datos = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('permisos.id','users.name','users.email','permisos.ndependencias','permisos.cdependencias','permisos.edependencias','permisos.ddependencias','permisos.nseries','permisos.cseries','permisos.eseries','permisos.dseries','permisos.nsubseries','permisos.csubseries','permisos.esubseries','permisos.dsubseries','permisos.nusuarios','permisos.cusuarios','permisos.eusuarios','permisos.dusuarios','users.id as pid')->where('user_id','=',$id)->get();
        /*dd($datos);*/
        $permisos = DB::table('permisos')->join('users','users.id', '=', 'permisos.user_id')->select('*')->where('users.id', '=', Auth::user()->id )->get();

        return view('users.edit', compact('data','datos','permisos'));
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
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        $permisos = Permisos::find($id);
        $permisos->ndependencias = $request->get('ndependencias');
        $permisos->cdependencias = $request->get('cdependencias');
        $permisos->edependencias = $request->get('edependencias');
        $permisos->ddependencias = $request->get('ddependencias');
        $permisos->nseries = $request->get('nseries');
        $permisos->cseries = $request->get('cseries');
        $permisos->eseries = $request->get('eseries');
        $permisos->dseries = $request->get('dseries');
        $permisos->nsubseries = $request->get('nsubseries');
        $permisos->csubseries = $request->get('csubseries');
        $permisos->esubseries = $request->get('esubseries');
        $permisos->dsubseries = $request->get('dsubseries');
        $permisos->nusuarios = $request->get('nusuarios');
        $permisos->cusuarios = $request->get('cusuarios');
        $permisos->eusuarios = $request->get('eusuarios');
        $permisos->dusuarios = $request->get('dusuarios');
        $permisos->user_id = $user->id;
        $permisos->save();

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permisos = Permisos::find($id);
        $permisos->delete();

        $user = User::find($id);
        $user->delete();

        return redirect('/users');
    }
}
