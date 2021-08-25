<?php

namespace App\Http\Livewire;

use App\Models\contador_pagina;
use App\Models\facultad;
use App\Models\modulo;
use App\Models\universidad;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarFacultadC extends Component
{
    use WithPagination;
    public $search="";
    protected $queryString = [
        'search'=>['except'=>''],
        'nrosPagina'=>['except'=>'']
    ];
    public $nrosPagina="3";
    public $otraPagina="actual";
    public $codigo;
    public $nombre;
    public $abreviatura;
    public $universidadNombre;
    public $universidad;
    public $elId;
    public $contador_pagina_facultad_vista;
    public $contador_pagina_facultad_crear;
    public $contador_pagina_facultad_editar;

    public function mount(){
        $this->universidad = universidad::where('id','=',1)->first();
        $this->universidadNombre = $this->universidad->nombre;
        $this->contador_pagina_facultad_crear = contador_pagina::where('nombre','=','facultad_crear')->first();
        $this->contador_pagina_facultad_vista = contador_pagina::where('nombre','=','facultad_vista')->first();
        $this->contador_pagina_facultad_editar = contador_pagina::where('nombre','=','facultad_editas')->first();
        if(!isset($this->contador_pagina_facultad_crear)){
            $this->contador_pagina_facultad_crear = contador_pagina::create([
                "nombre"=>"facultad_crear",
                "visitas"=>0
            ]);
        }
        if(!isset($this->contador_pagina_facultad_vista)){
            $this->contador_pagina_facultad_vista =  contador_pagina::create([
                "nombre"=>"facultad_vista",
                "visitas"=>1
            ]);
        }else{
            $this->contador_pagina_facultad_vista->visitas++;
            $this->contador_pagina_facultad_vista->save();
        }
        if(!isset($this->contador_pagina_facultad_editar)){
            $this->contador_pagina_facultad_editar = contador_pagina::create([
                "nombre"=>"facultad_editar",
                "visitas"=>0
            ]);
        }
    }

    public function render()
    {
        return view('livewire.gestionar_facultad_c',
            ['facultades'=>facultad::where('codigo','like',"%{$this->search}%")
                ->paginate($this->nrosPagina)]);
    }
    public function idActual($elId){
        $this->idActual = $elId;
    }

    public function irModulo($elId){
        return redirect()->route('gestionar_modulo_c',$elId);
    }

    public function crear(){
        $this->otraPagina="crear";
        $this->contador_pagina_facultad_crear->visitas++;
        $this->contador_pagina_facultad_crear->save();
    }

    public function crearFacultad(){
        $facultadCrear = new facultad();
        $facultadCrear->codigo = $this->codigo;
        $facultadCrear->nombre = $this->nombre;
        $facultadCrear->abreviatura = $this->abreviatura;
        $facultadCrear->universidad_id = $this->universidad->id;
        $facultadCrear->save();

        $reporte = new reporte();
        $reporte->tipo_usuario = "jefe de laboratorio";
        $reporte->user_id = auth()->user()->id;
        $reporte->usuario = auth()->user()->usuario;
        $reporte->operacion = "se creo la facultad " . $facultadCrear->nombre . " con abreviatura: "
            . $facultadCrear->abreviatura . " perteneciente a la univervidad: "
            . $facultadCrear->universidad->nombre;
        $reporte->fecha = Carbon::now();
        $reporte->save();


        $this->otraPagina = "actual";
    }

    public function eliminarFac($id){
        $facultadEliminado = facultad::find($id);


        $reporte = new reporte();
        $reporte->tipo_usuario = "jefe de laboratorio";
        $reporte->user_id = auth()->user()->id;
        $reporte->usuario = auth()->user()->usuario;
        $reporte->operacion = "se elimino la facultad " . $facultadEliminado->nombre . " con abreviatura: "
            . $facultadEliminado->abreviatura . " perteneciente a la univervidad: "
            . $facultadEliminado->universidad->nombre;
        $reporte->fecha = Carbon::now();

        $reporte->save();
        $facultadEliminado->delete();
    }

    public function cancelar(){
        $this->otraPagina = "actual";
        $this->contador_pagina_facultad_vista->visitas++;
        $this->contador_pagina_facultad_vista->save();
    }
}
