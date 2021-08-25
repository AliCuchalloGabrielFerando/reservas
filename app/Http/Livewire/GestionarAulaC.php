<?php

namespace App\Http\Livewire;

use App\Models\aula;
use App\Models\contador_pagina;
use App\Models\modulo;
use App\Models\tipo_aula;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\reporte;

class GestionarAulaC extends Component
{
    use WithPagination;
    public $search="";
    protected $queryString = [
        'search'=>['except'=>''],
        'nrosPagina'=>['except'=>'']
    ];
    public $nrosPagina="3";
    public $otraPagina="actual";
    public $usuario;
    public $fechaR;
    public $codigo_aula;
    public $capacidad;
    public $alta_baja;
    public $descripcion_de_ubicacion;

    public $tipo_id;
    public $moduloId;
    public $elId;
    public $modulo;

    public $moduloNumero;
    public $tipos_aulas;

    public $contador_pagina_aula_vista;
    public $contador_pagina_aula_crear;

    public function mount($id){
        $modulo = modulo::where('id','=',$id)->first();
        $this->moduloNumero = $modulo->nro;
        $this->moduloId = $modulo->id;
        $this->usuario = auth()->user()->usuario;
        $this->contador_pagina_aula_crear = contador_pagina::where('nombre','=','aula_crear')->first();
        $this->contador_pagina_aula_vista = contador_pagina::where('nombre','=','aula_vista')->first();
        if(!isset($this->contador_pagina_aula_crear)){
            $this->contador_pagina_aula_crear = contador_pagina::create([
                "nombre"=>"aula_crear",
                "visitas"=>0
            ]);
        }
        if(!isset($this->contador_pagina_aula_vista)){
            $this->contador_pagina_aula_vista =  contador_pagina::create([
                "nombre"=>"aula_vista",
                "visitas"=>1
            ]);
        }else{
            $this->contador_pagina_aula_vista->visitas++;
            $this->contador_pagina_aula_vista->save();
        }



    }
    public function render()
    {
        $this->tipos_aulas = tipo_aula::all();
        return view('livewire.facultad.gestionar_aula_c',
            ['aulas'=>aula::where('codigo_aula','like',"%{$this->search}%")
                ->where('modulo_id','=',$this->moduloId)
                ->paginate($this->nrosPagina)]);
    }

    public function idActual($elId){
        $this->idActual = $elId;
    }

    public function crear(){
        $this->otraPagina="crear";
        $this->contador_pagina_aula_crear->visitas++;
        $this->contador_pagina_aula_crear->save();
    }

    public function crearAula(){
        $aulaCrear = new aula();
        $aulaCrear->usuario = $this->usuario;
        $aulaCrear->fechaR = $this->fechaR;
        $aulaCrear->codigo_aula = $this->codigo_aula;
        $aulaCrear->capacidad = $this->capacidad;
        $aulaCrear->alta_baja = $this->alta_baja;
        $aulaCrear->modulo_id = $this->moduloId;
        $aulaCrear->tipo_aula_id =$this->tipo_id;
        $aulaCrear->descripcion_de_ubicacion = $this->descripcion_de_ubicacion;
        $aulaCrear->save();

        $reporte = new reporte();
        $reporte->tipo_usuario = "jefe de laboratorio";
        $reporte->user_id = auth()->user()->id;
        $reporte->usuario = auth()->user()->usuario;
        $reporte->operacion = "se creo el aula" . $aulaCrear->codigo_aula .
            " perteneciente al modulo: "
            . $aulaCrear->modulo->nro;
        $reporte->fecha = Carbon::now();

        $reporte->save();
        $this->otraPagina = "actual";
    }

    public function eliminarAula($id){
        $aulaEliminada = aula::find($id);
        $reporte = new reporte();
        $reporte->tipo_usuario = "jefe de laboratorio";
        $reporte->user_id = auth()->user()->id;
        $reporte->usuario = auth()->user()->usuario;
        $reporte->operacion = "se elimino el aula " . $aulaEliminada->codigo_aula .
            " perteneciente al modulo: "
            . $aulaEliminada->modulo->nro;
        $reporte->fecha = Carbon::now();

        $reporte->save();
        $aulaEliminada-> delete();
    }

    public function cancelar(){
        $this->otraPagina = "actual";
        $this->contador_pagina_aula_vista->visitas++;
        $this->contador_pagina_aula_vista->save();
    }
}
