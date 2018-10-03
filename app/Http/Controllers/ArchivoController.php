<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;

require __DIR__.'/../../../vendor/setasign/fpdf/fpdf.php';
require __DIR__.'/../../../vendor/setasign/fpdi/src/autoload.php';

class ArchivoController extends Controller
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
        $archivos = DB::table('archivos')
            ->join('stores', 'stores.id', '=', 'archivos.stores_id')
            ->select('archivos.*', 'stores.radicado')->where('archivos.id', '=', $id)
            ->get();

        /*dd($archivos);*/

        $pdf = new Fpdi();

        /*echo 'tmp/'.$archivos[0]->ruta.'.pdf';*/
        $pageCount = $pdf->setSourceFile(__DIR__.'/../../../public/tmp/'.$archivos[0]->ruta.'.pdf');
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);

            $pdf->AddPage();
            $pdf->useTemplate($templateId, ['adjustPageSize' => true]);

            $pdf->SetFont('courier');
            $pdf->SetXY(5, 2);
            $pdf->Write(8, $archivos[0]->radicado);
            $pdf->SetXY(190, 2);
            $pdf->Write(8, $archivos[0]->consecutivo);
        }

        $pdf->Output();


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
        /*dd($id)*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivos = DB::table('archivos')
            ->join('stores', 'stores.id', '=', 'archivos.stores_id')
            ->select('archivos.*', 'stores.radicado')->where('archivos.id', '=', $id)
            ->get();

        /*dd($archivos);*/

        $pdf = new Fpdi();

        /*echo 'tmp/'.$archivos[0]->ruta.'.pdf';*/
        $pageCount = $pdf->setSourceFile(__DIR__.'/../../../public/tmp/'.$archivos[0]->ruta.'.pdf');
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);

            $pdf->AddPage();
            $pdf->useTemplate($templateId, ['adjustPageSize' => true]);

            $pdf->SetFont('courier');
            $pdf->SetXY(5, 2);
            $pdf->Write(8, $archivos[0]->radicado);
            $pdf->SetXY(190, 2);
            $pdf->Write(8, $archivos[0]->consecutivo);
        }

        $pdf->Output(__DIR__.'/../../../public/tmp/'.$archivos[0]->ruta.'.pdf', 'D');
    }
}
