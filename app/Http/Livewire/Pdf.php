<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Dompdf\Dompdf;
class Pdf extends Component
{
    public function render()
    {
        return view('livewire.pdf');

    }
    public function descargar(){
        $pdf = new Dompdf();
        $pdf->loadHtml('reporte');//, [
        /*    'users' => user::all()
        ]);*/
        // Render the HTML as PDF
        $pdf->render();

// Output the generated PDF to Browser
        $pdf->stream();
        $pdf->output();
       //$pdf->save(storage_path('app/public/') . 'reporte.pdf');

        return response()->download(storage_path('app/public/') . 'reporte.pdf');
    }
}
