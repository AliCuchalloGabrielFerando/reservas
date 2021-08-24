<?php

namespace App\Http\Livewire;

use App\Models\contador_pagina;
use App\Models\facultad;
use App\Models\modulo;
use Livewire\WithPagination;
use Livewire\Component;

class GestionarModuloC extends Component
{
    use WithPagination;
    public $search="";
    protected $queryString = [
        'search'=>['except'=>''],
        'nrosPagina'=>['except'=>'']
    ];
    public $nrosPagina="3";
    public $otraPagina="actual";
    public $numero;
    public $facultadId;
    public $elId;
    public $facuID;
    public $facultad;
    public $facultadNombre;
    public $contador_pagina_modulo_vista;
    public $contador_pagina_modulo_crear;
    public $contador_pagina_modulo_editar;

    public function mount($id){
        $facultad = facultad::where('id','=',$id)->first();
        $this->facultadNombre = $facultad->nombre;
        $this->facuID = $facultad->id;

        $this->contador_pagina_modulo_crear = contador_pagina::where('nombre','=','modulo_crear')->first();
        $this->contador_pagina_modulo_vista = contador_pagina::where('nombre','=','modulo_vista')->first();
        $this->contador_pagina_modulo_editar = contador_pagina::where('nombre','=','modulo_editas')->first();
        if(!isset($this->contador_pagina_modulo_crear)){
            $this->contador_pagina_modulo_crear = contador_pagina::create([
                "nombre"=>"modulo_crear",
                "visitas"=>0
            ]);
        }
        if(!isset($this->contador_pagina_modulo_vista)){
            $this->contador_pagina_modulo_vista =  contador_pagina::create([
                "nombre"=>"modulo_vista",
                "visitas"=>1
            ]);
        }else{
            $this->contador_pagina_modulo_vista->visitas++;
            $this->contador_pagina_modulo_vista->save();
        }
        if(!isset($this->contador_pagina_modulo_editar)){
            $this->contador_pagina_modulo_editar = contador_pagina::create([
                "nombre"=>"modulo_editar",
                "visitas"=>0
            ]);
        }
    }

    public function render()
    {
        return view('livewire.gestionar_modulo_c',
            ['modulos'=>modulo::where('nro','like',"%{$this->search}%")
                ->where('facultad_id','=',$this->facuID)
                ->paginate($this->nrosPagina)]);
    }

    public function idActual($elId){
        $this->idActual = $elId;
    }

    public function irAulas($elId){
        return redirect()->route('gestionar_aula_c',[$elId]);
    }

    public function crear(){
        $this->otraPagina="crear";
        $this->contador_pagina_modulo_crear->visitas++;
        $this->contador_pagina_modulo_crear->save();
    }

    public function crearModulo(){
        $moduloCrear = new modulo();
        $moduloCrear->nro = $this->numero;
        $moduloCrear->facultad_id = $this->facultadId;
        $moduloCrear->save();
        $this->otraPagina = "actual";
    }

    public function eliminarMod($id){
        $moduloEliminado = modulo::find($id);
        $moduloEliminado-> delete();
    }

    public function cancelar(){
        $this->otraPagina = "actual";
        $this->contador_pagina_modulo_vista->visitas++;
        $this->contador_pagina_modulo_vista->save();
    }
}
