<?php

namespace App\Http\Livewire;

use App\Models\aula;
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
    public $tipoAula;
    public $nombreAula;
    public $moduloId;
    public $elId;
    public $modulo;
    public $moduloNumero;

    public function mount($id){
        $modulo = modulo::where('id','=',$id)->first();
        $this->moduloNumero = $modulo->nro;
        $this->moduloId = $modulo->id;

    }
    public function render()
    {
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
    }

    public function crearAula(){
        $aulaCrear = new aula();
        $aulaCrear->usuario = $this->usuario;
        $aulaCrear->fechaR = $this->fechaR;
        $aulaCrear->codigo_aula = $this->codigo_aula;
        $aulaCrear->capacidad = $this->capacidad;
        $aulaCrear->alta_baja = $this->alta_baja;
        $aulaCrear->modulo_id = $this->moduloId;
        $this->tipoAula = tipo_aula::where('nombre','=',$this->nombreAula)->first();
        $aulaCrear->tipo_aula_id = $this->tipoAula->id;
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
    }
}
