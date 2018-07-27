<?php

namespace App\Http\Controllers;

use App\Dependencias;
use App\Serie;
use App\SubSeries;
use App\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = count(Dependencias::all()->toArray()) ;
        $series = count(Serie::all()->toArray()) ;
        $Subseries = count(SubSeries::all()->toArray()) ;
        /*$timeline = Timeline::all()->toArray();*/
        $timeline = DB::table('timelines')->join('users','users.id', '=', 'timelines.users_id')->select('timelines.id','timelines.tabla','timelines.nombre','timelines.codigo','timelines.action','timelines.created_at','users.name')->get()->sortByDesc('created_at');
        /*dd($timeline);*/
        return view('home', compact('dependencias', 'series','timeline','Subseries'));
    }
}
