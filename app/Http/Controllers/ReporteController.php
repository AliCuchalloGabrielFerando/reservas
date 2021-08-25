<?php

namespace App\Http\Controllers;

use App\Models\reporte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fecha_inicio = $request["fecha_inicio"];
        $fecha_fin = $request["fecha_fin"];
        $pdf = App::make('dompdf.wrapper');
        $reportes = reporte::whereBetween('fecha',[$fecha_inicio,$fecha_fin])->get();
        $pdf->loadView('reporte',[
            'reportes' => $reportes,
            'total'=>sizeof($reportes)
        ]);
        return $pdf->stream();
        //return  view('reporte',['reportes' => $reportes,'total'=>sizeof($reportes)]);

    }
}
