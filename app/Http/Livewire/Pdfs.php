<?php

namespace App\Http\Livewire;

use Barryvdh\DomPDF\PDF;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\App;
use Livewire\Component;
//use PDF;
use App\Models\User;
//use Dompdf\Dompdf;
class Pdfs extends Component
{
    public $fecha_inicio;
    public $fecha_fin;
    public function render()
    {
        return view('livewire.pdfs');

    }
    public function descargar(){
        //$pdf = new Dompdf();
       // $pdf->loadHtml('reporte');//, [
        /*    'users' => user::all()
        ]);*/
        // Render the HTML as PDF
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('reporte',[
           'users' => user::all()
        ]);
       // return $pdf->stream();
       // $pdf->render();
/* $pdf->loadView('reporte',[
           'users' => user::all()
        ]);
*/
// Output the generated PDF to Browser
        //return $pdf->download('reportenuevo.pdf');
       // $pdf->output();
       $pdf->save(storage_path('app/public/') . 'reporte.pdf');

        return response()->download(storage_path('app/public/') . 'reporte.pdf');
    }
    public function ver(){
        return redirect()->route('ver');
    }
}
