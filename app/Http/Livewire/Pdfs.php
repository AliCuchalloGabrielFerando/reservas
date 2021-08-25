<?php

namespace App\Http\Livewire;

use App\Models\contador_pagina;
use App\Models\reporte;
use Barryvdh\DomPDF\PDF;
use Dompdf\Adapter\PDFLib;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Carbon\Carbon;

//use PDF;
use App\Models\User;
//use Dompdf\Dompdf;
class Pdfs extends Component
{
    public $fecha_inicio;
    public $fecha_i;
    public $fecha_fin;
    public $fecha_f;

    public $bandera;

    public $contador_pagina_reporte_vista;

    protected $listeners = ['habilitar'=>'verificar'];
    public  function verificar(){

    }
    public function mount(){
        $this->contador_pagina_reporte_vista = contador_pagina::where('nombre','=','reporte_vista')->first();
        if(!isset($this->contador_pagina_reporte_vista)){
            $this->contador_pagina_reporte_vista =  contador_pagina::create([
                "nombre"=>"reporte_vista",
                "visitas"=>1
            ]);
        }else{
            $this->contador_pagina_reporte_vista->visitas++;
            $this->contador_pagina_reporte_vista->save();
        }
    }

    public function render()
    {

        if(isset($this->fecha_fin) && isset($this->fecha_inicio)){
            $this->fecha_f = Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_fin. " 23:59:59");
            $this->fecha_i = Carbon::createFromFormat('Y-m-d H:i:s',$this->fecha_inicio . " 00:00:00");

           if($this->fecha_f>=$this->fecha_i){
               $this->bandera = true;
            }else{
               $this->bandera = false;
           }
        }
        return view('livewire.pdfs');

    }
    public function descargar(){

        $pdf = App::make('dompdf.wrapper');
        $reportes = reporte::whereBetween('fecha',[$this->fecha_i,$this->fecha_f])->get();
        $pdf->loadView('reporte',[
           'reportes' => $reportes,
            'total'=>sizeof($reportes)
        ]);

       $pdf->save(storage_path('app/public/') . 'reporte.pdf');

        return response()->download(storage_path('app/public/') . 'reporte.pdf');
    }

}
