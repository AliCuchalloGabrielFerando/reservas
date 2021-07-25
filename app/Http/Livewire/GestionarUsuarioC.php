<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class GestionarUsuarioC extends Component
{
    use WithPagination;
    public $search="";
    protected $queryString = [
        'search'=>['except'=>''],
        'nrosPagina'=>['except'=>'']
    ];
    public $otraPagina= "actual";
    public $nrosPagina ="3";
    public $nuevoNombre;
    public $nuevoUsuario;
    public $nuevoPass;
    public $crearNombre;
    public $crearUsuario;
    public $crearPass;
    public $crearfechaR;
    public $alta_baja;
    public function render()
    {
        return view('livewire.gestionar_usuario_c',
        ['usuarios'=>User::where('name','like',"%{$this->search}%")
            ->orwhere('usuario','like',"%{$this->search}%")
            ->paginate($this->nrosPagina)]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public  function clear(){
        $this->search= "";
        $this->page= 1;
        $this->nrosPagina= "3";
    }

    public function cambioPag($id){
        $this->otraPagina = $id;
        $usuarioC = User::find($this->otraPagina);
        $this->nuevoNombre = $usuarioC->name;
        $this->nuevoUsuario = $usuarioC->usuario;
        $this->nuevoPass = $usuarioC->contraseña;
    }

    public function cancelar(){
        $this->otraPagina = "actual";
    }

    public function volver(){
        $usuarioEditado = User::find($this->otraPagina);
        $usuarioEditado->name = $this->nuevoNombre;
        $usuarioEditado->usuario = $this->nuevoUsuario;
        $usuarioEditado->contraseña = $this->nuevoPass;
        $usuarioEditado-> save();
        $this->otraPagina = "actual";
    }

    public function crear(){
        $this->otraPagina = "crear";
    }

    public function guardarCrear(){
        $usuarioGuardar = new User();
        $usuarioGuardar->name = $this->nuevoNombre;
        $usuarioGuardar->contraseña = $this->nuevoPass;
        $usuarioGuardar->usuario = $this->nuevoPass;
        $usuarioGuardar->alta_baja = $this->alta_baja;
        $usuarioGuardar->fechaR = $this->crearfechaR;
        $usuarioGuardar-> save();
        $this->otraPagina = "actual";

    }
}
