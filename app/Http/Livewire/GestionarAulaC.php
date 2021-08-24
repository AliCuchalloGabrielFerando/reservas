<?php

namespace App\Http\Livewire;

use App\Models\aula;
use App\Models\contador_pagina;
use App\Models\modulo;
use App\Models\tipo_aula;
use Livewire\WithPagination;
use Livewire\Component;

class GestionarAulaC extends Component
{
    use WithPagination;
    public $buscar="";
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
        return view('livewire.gestionar_aula_c',
            ['aulas'=>aula::where('codigo_aula','like',"%{$this->buscar}%")
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
        $this->otraPagina = "actual";
    }

    public function eliminarAula($id){
        $aulaEliminada = aula::find($id);
        $aulaEliminada-> delete();
    }

    public function cancelar(){
        $this->otraPagina = "actual";
        $this->contador_pagina_aula_vista->visitas++;
        $this->contador_pagina_aula_vista->save();
    }
}
