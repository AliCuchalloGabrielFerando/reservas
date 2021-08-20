<?php

namespace App\Http\Livewire\Reserva;

use App\Models\aula;
use App\Models\Estado;
use App\Models\gestion_academica;
use App\Models\grupo;
use App\Models\grupom;
use App\Models\materia;
use App\Models\materia_grupom;
use App\Models\persona;
use App\Models\Prioridad;
use App\Models\reserva;
use App\Models\reserva_aula;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CrearReserva extends Component
{
    public $personas;
    public $materias;
    public $grupos;
    public $laboratorios;
    public $prioridades;
    public $estados;

    public $reserva_actual;


    public $estado;

    public $dias_reservados;
    public $modal;

    public $beneficiario;
    public $materia;
    public $grupo;
    public $laboratorio;
    public $fecha_inicio;
    public $fecha_fin;
    public $actividad;
    public $prioridad;

    public $dias;
    public $hora_inicio;
    public $hora_fin;

    public function mount($id = null)
    {
        $this->dias = collect([]);
        $this->dias_reservados = collect([]);

        $this->personas = persona::all();
        $this->materias = materia::all();
        $this->laboratorios = aula::all();
        $this->prioridades = Prioridad::all();

        if ($id == null) {
            $this->estado = Estado::where('nombre', 'Proceso')->first()->id;

            $this->beneficiario = $this->personas->first()->ci;
            $this->materia = $this->materias->first()->id;
            $this->laboratorio = $this->laboratorios->first()->id;
            $this->prioridad = $this->prioridades->first()->id;

            $this->grupos = grupom::select('grupom.*')
                ->join('materia_grupom', 'grupom_id', '=', 'grupom.id')
                ->where('materia_grupom.materia_id', $this->materia)->get();

            $this->grupo = $this->grupos->first()->id;

        } else {
            $this->reserva_actual = reserva::find($id);
            $this->estado = $this->reserva_actual->estado_id;
            $this->beneficiario = $this->reserva_actual->persona_ci;
            $this->prioridad = $this->reserva_actual->prioridad_id;

            $materia_grupo = materia_grupom::where('id', $this->reserva_actual->materia_grupom_id)->first();
            $reserva_aula = reserva_aula::where('reserva_id', $this->reserva_actual->id)->get();
            $this->estados = Estado::all();

            $this->grupo = $materia_grupo->grupom_id;
            $this->materia = $materia_grupo->materia_id;
            $this->laboratorio = $reserva_aula->first()->aula_id;

            $this->fecha_inicio = $this->reserva_actual->fecha_inicio;
            $this->fecha_fin = $this->reserva_actual->fecha_fin;
            $this->actividad = $this->reserva_actual->actividad;

            $this->grupos = grupom::select('grupom.*')
                ->join('materia_grupom', 'grupom_id', '=', 'grupom.id')
                ->where('materia_grupom.materia_id', $this->materia)->get();

            foreach ($reserva_aula as $r_a) {
                $this->dias_reservados->push(['hora_inicio' => $r_a->hora_inicio, 'hora_fin' => $r_a->hora_fin, 'dias' => $r_a->dias]);
            }


        }
    }


    public function updated($propertyName)
    {

        if ($propertyName == 'materia') {
            $this->grupos = grupom::select('grupom.*')
                ->join('materia_grupom', 'grupom_id', '=', 'grupom.id')
                ->where('materia_grupom.materia_id', $this->materia)->get();

            $this->grupo = $this->grupos->first()->id;
        }
    }

    public function render()
    {
        return view('livewire.reserva.crear-reserva');
    }

    public function reservar()
    {
        /*$begin = new Carbon( $this->fecha_inicio );
        $end   = new Carbon( $this->fecha_fin );
        $dates=collect([]);
        for ($i = $begin; $i <= $end; $i->addDay()) {
            $dates->push($i->toDateString());
        }*/

        /*      $d='';

              $reserva_aula=reserva_aula::where('aula_id',$this->laboratorio)
                  ->join('reserva','reserva.id','=','reserva_aula.reserva_id')
                  ->where(function($query) {
                      $query->whereBetween('hora_inicio', [$this->hora_inicio,$this->hora_fin])
                          ->orWhereBetween('hora_fin', [$this->hora_inicio,$this->hora_fin]);
                  })
                  ->where(function($query) {
                      $query->whereBetween('fecha_inicio', [$this->fecha_inicio,$this->fecha_fin])
                          ->orWhereBetween('fecha_fin', [$this->fecha_inicio,$this->fecha_fin]);
                  })
                  ->get();*/


        DB::beginTransaction();
        try {
            $gestion = gestion_academica::latest('created_at')->first();

            $materia_grupo = materia_grupom::where('materia_id', $this->materia)
                ->where('grupom_id', $this->grupo)->first();

            if ($this->reserva_actual == null) {
                $this->reserva_actual = new reserva();
            }

            $this->reserva_actual->actividad = $this->actividad;
            $this->reserva_actual->fecha_inicio = $this->fecha_inicio;
            $this->reserva_actual->fecha_fin = $this->fecha_fin;

            $this->reserva_actual->estado_id = $this->estado;
            $this->reserva_actual->prioridad_id = $this->prioridad;
            $this->reserva_actual->materia_grupom_id = $materia_grupo->id;
            $this->reserva_actual->gestion_academica_id = $gestion->id;
            $this->reserva_actual->persona_ci = $this->beneficiario;
            $this->reserva_actual->jefe_lab_cod = Auth::user()->id;

            $this->reserva_actual->save();

            reserva_aula::where('reserva_id',$this->reserva_actual->id)->delete();

            foreach ($this->dias_reservados as $dia_reservado) {
                reserva_aula::create([
                    'dias' => $dia_reservado['dias'],
                    'hora_inicio' => $dia_reservado['hora_inicio'],
                    'hora_fin' => $dia_reservado['hora_fin'],
                    'reserva_id' => $this->reserva_actual->id,
                    'aula_id' => $this->laboratorio,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
        }

    }

    public function agregarDias()
    {
        $d = '';
        foreach ($this->dias as $dia) {
            $d = $d == '' ? $dia : $d . '-' . $dia;
        }
        $this->dias_reservados->push(['hora_inicio' => $this->hora_inicio, 'hora_fin' => $this->hora_fin, 'dias' => $d]);
        $this->modal = false;
    }

    public function eliminarDia($key){
        $this->dias_reservados->forget($key);
    }

}
