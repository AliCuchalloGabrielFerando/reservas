<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    public $crearFechaR;
    public $alta_baja;
    public $docenteCod;
    public $jefeLabCod;
    public $auxiliarCod;
    public $grupoId;
    public $crearEmail;
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
        $this->nuevoPass = $usuarioC->password;
    }

    public function eliminarPag($id){
        $usuarioEliminado = User::find($id);
        $usuarioEliminado-> delete();
    }

    public function cancelar(){
        $this->otraPagina = "actual";
    }

    public function editar(){
        $usuarioEditado = User::find($this->otraPagina);
        $usuarioEditado->name = $this->nuevoNombre;
        $usuarioEditado->usuario = $this->nuevoUsuario;
        $usuarioEditado->password = Hash::make($this->nuevoPass);
        $usuarioEditado->save();
        $this->otraPagina = "actual";
    }

    public function crear(){
        $this->otraPagina = "crear";
    }

    public function guardarCrear(){
        $usuarioGuardar = new User();
        $usuarioGuardar->name = $this->crearNombre;
        $usuarioGuardar->password = Hash::make($this->crearPass);
        $usuarioGuardar->usuario = $this->crearUsuario;
        $usuarioGuardar->alta_baja = $this->alta_baja;
        $usuarioGuardar->fechaR = $this->crearFechaR;
        $usuarioGuardar->grupo_id = $this->grupoId;
        if ($this->docenteCod != '') {
            $usuarioGuardar->docente_cod = $this->docenteCod;
        }
        if ($this->docenteCod != '') {
            $usuarioGuardar->jefe_lab_cod = $this->jefeLabCod;
        }
        if ($this->docenteCod != '') {
            $usuarioGuardar->auxiliar_cod = $this->auxiliarCod;
        }
        $usuarioGuardar->email = $this->crearEmail;
        $usuarioGuardar-> save();
        $this->otraPagina = "actual";

    }
}
