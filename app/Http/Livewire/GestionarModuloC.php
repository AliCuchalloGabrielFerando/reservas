<?php

namespace App\Http\Livewire;

use App\Models\modulo;
use Livewire\WithPagination;
use Livewire\Component;

class GestionarModuloC extends Component
{
    use WithPagination;
    public $buscar="";
    public $nrosPagina="3";
    public $otraPagina="actual";
    public $numero;
    public $facultadId;
    public $elId;
    public $facuID;
    public function mount($id){
        $this->facuID = $id;
    }
    public function render()
    {
        return view('livewire.gestionar_modulo_c',
            ['modulos'=>modulo::where('nro','like',"%{$this->buscar}%")
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
    }
}
