<?php

namespace App\Http\Livewire;

use App\Models\contador_pagina;
use App\Models\grupo;
use App\Models\jefe_lab;
use App\Models\persona;
use App\Models\reporte;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use function Sodium\increment;


class GestionarUsuarioC extends Component
{
    use WithPagination;

    public $search = "";
    protected $queryString = [
        'search' => ['except' => ''],
        'nrosPagina' => ['except' => '']
    ];
    public $otraPagina = "actual";
    public $nrosPagina = "3";
    public $nuevoNombre;
    public $nuevoUsuario;
    public $nuevoPass;
    public $crearNombre;
    public $crearUsuario;
    public $crearPass;
    public $crearFechaR;
    public $alta_baja;
    public $docenteCod;
    public $jefeLabNombre = "";
    public $docenteNombre = "";
    public $auxiliarNombre = "";
    public $jefeLabCod;
    public $auxiliarCod;
    public $grupoId;
    public $crearEmail;
    public $idActual;
    public $persona_ci;
    public $grupoNombre = "";
    public $contador_pagina_usuario_vista;
    public $contador_pagina_usuario_crear;
    public $contador_pagina_usuario_editar;

    public function mount(){
        $this->contador_pagina_usuario_crear = contador_pagina::where('nombre','=','usuario_crear')->first();
        $this->contador_pagina_usuario_vista = contador_pagina::where('nombre','=','usuario_vista')->first();
        $this->contador_pagina_usuario_editar = contador_pagina::where('nombre','=','usuario_editas')->first();
        if(!isset($this->contador_pagina_usuario_crear)){
            $this->contador_pagina_usuario_crear = contador_pagina::create([
                "nombre"=>"usuario_crear",
                "visitas"=>0
            ]);
        }
        if(!isset($this->contador_pagina_usuario_vista)){
            $this->contador_pagina_usuario_vista =  contador_pagina::create([
                "nombre"=>"usuario_vista",
                "visitas"=>1
            ]);
        }else{
            $this->contador_pagina_usuario_vista->visitas++;
            $this->contador_pagina_usuario_vista->save();
        }
        if(!isset($this->contador_pagina_usuario_editar)){
            $this->contador_pagina_usuario_editar = contador_pagina::create([
                "nombre"=>"usuario_editar",
                "visitas"=>0
            ]);
        }
    }
    public function render()
    {
        return view('livewire.gestionar_usuario_c',
            ['usuarios' => User::where('name', 'like', "%{$this->search}%")
                ->orwhere('usuario', 'like', "%{$this->search}%")
                ->paginate($this->nrosPagina),
                'grupos' => grupo::where('nombre', 'like', "%{$this->grupoNombre}%")->get(),

                'jefes' => DB::table('persona')
                    ->rightJoin('jefe_lab', 'ci', '=', 'persona_ci')
                    ->leftjoin('users', 'cod', '=', 'jefe_lab_cod')
                    ->whereNull('jefe_lab_cod')
                  //  ->where('nombre', 'like', "%{$this->jefeLabNombre}%")
                    ->get(),
                'docentes' => DB::table('persona')
                    ->rightJoin('docente', 'ci', '=', 'persona_ci')
                    ->leftjoin('users', 'cod', '=', 'docente_cod')
                    ->whereNull('docente_cod')
                  //  ->where('nombre', 'like', "%{$this->docenteNombre}%")
                    ->get(),
                'auxiliares' => DB::table('persona')
                    ->rightJoin('auxiliar', 'ci', '=', 'persona_ci')
                    ->leftjoin('users', 'cod', '!=', 'auxiliar_cod')
                    ->whereNull('auxiliar_cod')
                  //  ->where('nombre', 'like', "%{$this->auxiliarNombre}%")
                    ->get(),

            ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /*public function idActual($elId){
        $this->idActual = $elId;
    }*/

    public function clear()
    {
        $this->search = "";
        $this->page = 1;
        $this->nrosPagina = "3";
    }

    public function irEditar($elId)
    {
        $this->otraPagina = $elId;
        $usuarioC = User::find($this->otraPagina);
        $this->nuevoNombre = $usuarioC->name;
        $this->nuevoUsuario = $usuarioC->usuario;
        $this->nuevoPass = $usuarioC->password;

        $this->contador_pagina_usuario_editar->visitas++;
        $this->contador_pagina_usuario_editar->save();
    }

    public function eliminarPag()
    {
        $usuarioEliminado = User::find($this->idActual);
        $tipo_usuarioEditado = "";
        if (isset($usuarioEliminado->jefe_lab)) {
            $tipo_usuarioEditado = "jefe de laboratorio";
        } else if (isset($usuarioEliminado->docente)) {
            $tipo_usuarioEditado = "docente";
        } else {
            $tipo_usuarioEditado = "auxiliar";
        }
        $reporte = new reporte();
        $reporte->tipo_usuario = "jefe de laboratorio";
        $reporte->user_id = auth()->user()->id;
        $reporte->usuario = auth()->user()->usuario;
        $reporte->operacion = "se elimino la cuenta " . $usuarioEliminado->name . " con usuario: "
            . $usuarioEliminado->usuario . " de tipo: " . $tipo_usuarioEditado;
        $reporte->fecha = Carbon::now();

        $reporte->save();
        $usuarioEliminado->delete();
    }

    public function cancelar()
    {
        $this->otraPagina = "actual";
        $this->contador_pagina_usuario_vista->visitas++;
        $this->contador_pagina_usuario_vista->save();

        $this->crearEmail = '';
        $this->crearFechaR = '';
        $this->crearNombre = '';
        $this->crearPass = '';
        $this->crearUsuario = '';
    }

    public function editar()
    {
        $usuarioEditado = User::find($this->otraPagina);
        $usuarioEditado->name = $this->nuevoNombre;
        $usuarioEditado->usuario = $this->nuevoUsuario;
        $usuarioEditado->password = Hash::make($this->nuevoPass);
        $usuarioEditado->save();
        $tipo_usuarioEditado = "";
        if (isset($usuarioEditado->jefe_lab)) {
            $tipo_usuarioEditado = "jefe de laboratorio";
        } else if (isset($usuarioEditado->docente)) {
            $tipo_usuarioEditado = "docente";
        } else {
            $tipo_usuarioEditado = "auxiliar";
        }
        $reporte = new reporte();
        $reporte->tipo_usuario = "jefe de laboratorio";
        $reporte->user_id = auth()->user()->id;
        $reporte->usuario = auth()->user()->usuario;
        $reporte->operacion = "se edito el usuario " . $usuarioEditado->name . " con usuario: "
            . $usuarioEditado->usuario . " de tipo: " . $tipo_usuarioEditado;
        $reporte->fecha = Carbon::now();
        $reporte->save();

        $this->crearEmail = '';
        $this->crearFechaR = '';
        $this->crearNombre = '';
        $this->crearPass = '';
        $this->crearUsuario = '';


        $this->otraPagina = "actual";
    }

    public function crear()
    {
        $this->otraPagina = "crear";
        $this->contador_pagina_usuario_crear->visitas++;
        $this->contador_pagina_usuario_crear->save();
    }

    public function guardarCrear($grupo_id)
    {
        $usuarioGuardar = new User();
        $usuarioGuardar->name = $this->crearNombre;
        $usuarioGuardar->password = Hash::make($this->crearPass);
        $usuarioGuardar->usuario = $this->crearUsuario;
        $usuarioGuardar->alta_baja = $this->alta_baja;
        $usuarioGuardar->fechaR = Carbon::now()->format('y-m-d');
        $usuarioGuardar->grupo_id = $grupo_id;

        $tipo_usuario="";
        if ($this->docenteCod != '') {
            $usuarioGuardar->docente_cod = $this->docenteCod;
            $tipo_usuario = "docente";
            $this->docenteCod = '';
        }
        if ($this->jefeLabCod != '') {
            $jefe = jefe_lab::where('persona_ci', '=', $this->persona_ci)->first();
            $this->jefeLabCod = $jefe->cod;
            $usuarioGuardar->jefe_lab_cod = $this->jefeLabCod;
            $tipo_usuario = "jefe de laboratorio";
            $this->jefeLabCod = '';
        }
        if ($this->auxiliarCod != '') {
            $usuarioGuardar->auxiliar_cod = $this->auxiliarCod;
            $tipo_usuario= "auxiliar";
            $this->auxiliarCod = '';
        }
        $usuarioGuardar->email = $this->crearEmail;
        $usuarioGuardar->save();
        $reporte = new reporte();
        $reporte->tipo_usuario = "jefe de laboratorio";
        $reporte->user_id = auth()->user()->id;
        $reporte->usuario = auth()->user()->usuario;
        $reporte->operacion = "se creo el usuario " . $this->crearNombre . " con usuario: "
            . $this->crearUsuario . " de tipo: " . $tipo_usuario;
        $reporte->fecha = Carbon::now();
        $reporte->save();




        $this->crearEmail = '';
        $this->crearFechaR = '';
        $this->crearNombre = '';
        $this->crearPass = '';
        $this->crearUsuario = '';


        $this->otraPagina = "actual";

    }

    public function requerido($grupo_id)
    {
        $this->grupoId = $grupo_id;

    }

    public function requeridoJefe($persona_ci)
    {
        //  $jefe = jefe_lab::where('persona_ci','=',$persona_ci)->first();
        $this->persona_ci = $persona_ci;
        $this->jefeLabCod = 'entrar';
    }

    public function requeridoAuxiliar($persona_ci)
    {
        //  $jefe = jefe_lab::where('persona_ci','=',$persona_ci)->first();
        $this->persona_ci = $persona_ci;
        $this->auxiliarCod = 'entrar';
    }

    public function requeridoDocente($persona_ci)
    {
        //  $jefe = jefe_lab::where('persona_ci','=',$persona_ci)->first();
        $this->persona_ci = $persona_ci;
        $this->docenteCod = 'entrar';
    }
}
