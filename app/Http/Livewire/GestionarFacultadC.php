<?php

namespace App\Http\Livewire;

use App\Models\facultad;
use App\Models\modulo;
use App\Models\universidad;
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
    public $buscar="";
    public $nrosPagina="3";
    public $otraPagina="actual";
    public $codigo;
    public $nombre;
    public $abreviatura;
    public $universidadNombre;
    public $universidad;
    public $elId;
    public function mount(){
        $this->universidad = universidad::where('id','=',1)->first();
        $this->universidadNombre = $this->universidad->nombre;
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
    }

    public function crearFacultad(){
        $facultadCrear = new facultad();
        $facultadCrear->codigo = $this->codigo;
        $facultadCrear->nombre = $this->nombre;
        $facultadCrear->abreviatura = $this->abreviatura;
        $facultadCrear->universidad_id = $this->universidad->id;
        $facultadCrear->save();
        $this->otraPagina = "actual";
    }

    public function eliminarFac($id){
        $facultadEliminado = facultad::find($id);
        $facultadEliminado->delete();
    }

    public function cancelar(){
        $this->otraPagina = "actual";
    }
}
