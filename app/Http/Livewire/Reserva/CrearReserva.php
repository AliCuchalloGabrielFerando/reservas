<?php

namespace App\Http\Livewire\Reserva;

use App\Models\aula;
use App\Models\contador_pagina;
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
use Carbon\Traits\Creator;
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

    public $crear;
    public $mensaje;

    public $contador_pagina_reserva_crear;

    public function mount($id = null)
    {
        $this->contador_pagina_reserva_crear = contador_pagina::where('nombre', '=', 'reserva_crear')->first();
        if (!isset($this->contador_pagina_reserva_crear)) {
            $this->contador_pagina_reserva_crear = contador_pagina::create([
                "nombre" => "reserva_crear",
                "visitas" => 1
            ]);
        } else {
            $this->contador_pagina_reserva_crear->visitas++;
            $this->contador_pagina_reserva_crear->save();
        }

        $this->dias = collect([]);
        $this->dias_reservados = collect([]);

        $this->personas = persona::all();
        $this->materias = materia::all();
        $this->laboratorios = aula::all();
        $this->prioridades = Prioridad::all();
        $this->estados = Estado::all();

        if ($id == null) {
            $this->crear = true;
            $this->estado = $this->estados->first()->id;

            $this->beneficiario = $this->personas->first()->ci;
            $this->materia = 0;
            $this->laboratorio = $this->laboratorios->first()->id;
            $this->prioridad = $this->prioridades->first()->id;

            $this->grupos = grupom::select('grupom.*')
                ->join('materia_grupom', 'grupom_id', '=', 'grupom.id')
                ->where('materia_grupom.materia_id', $this->materia)->get();

            $this->grupo = 0;

        } else {
            $this->crear = false;
            $this->reserva_actual = reserva::find($id);
            $this->estado = $this->reserva_actual->estado_id;
            $this->beneficiario = $this->reserva_actual->persona_ci;
            $this->prioridad = $this->reserva_actual->prioridad_id;

            if ($this->reserva_actual->materia_grupom_id == null) {
                $this->grupo = 0;
                $this->materia = 0;
            } else {
                $materia_grupo = materia_grupom::where('id', $this->reserva_actual->materia_grupom_id)->first();
                $this->grupo = $materia_grupo->grupom_id;
                $this->materia = $materia_grupo->materia_id;
            }

            $reserva_aula = reserva_aula::where('reserva_id', $this->reserva_actual->id)->get();
            $this->estados = Estado::all();


            $this->laboratorio = $reserva_aula->first()->aula_id;

            $this->fecha_inicio = $this->reserva_actual->fecha_inicio;
            $this->fecha_fin = $this->reserva_actual->fecha_fin;
            $this->actividad = $this->reserva_actual->actividad;

            $this->grupos = grupom::select('grupom.*')
                ->join('materia_grupom', 'grupom_id', '=', 'grupom.id')
                ->where('materia_grupom.materia_id', $this->materia)->get();

            foreach ($reserva_aula as $r_a) {
                $dias = json_decode($r_a->dias, true);
                $d='';
                foreach ($dias as $dia){
                    $dia=new Carbon($dia);
                    $d = $d == '' ? $dia->dayName : $d . '-' . $dia->dayName;
                }
                $this->dias_reservados->push(['hora_inicio' => $r_a->hora_inicio, 'hora_fin' => $r_a->hora_fin, 'dias' => $d]);
            }
        }
    }


    public function updated($propertyName)
    {
        if ($propertyName == 'materia') {
            if ($this->materia != 0) {
                $this->grupos = grupom::select('grupom.*')
                    ->join('materia_grupom', 'grupom_id', '=', 'grupom.id')
                    ->where('materia_grupom.materia_id', $this->materia)->get();

                $this->grupo = $this->grupos->first()->id;
            } else {
                $this->grupo = 0;
            }
        }
        $this->mensaje = '';
    }

    public function render()
    {
        return view('livewire.reserva.crear-reserva');
    }

    public function reservar()
    {
        DB::beginTransaction();
        try {


            $dates = collect([]);
            foreach ($this->dias_reservados as $dia_reservado) {
                $dias = explode("-", $dia_reservado['dias']);

                $dates->push($this->obtenerFechas($dias));
            }

            if ($dates->isEmpty()) {
                return;
            } else {


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
                $this->reserva_actual->materia_grupom_id = $materia_grupo == null ? null : $materia_grupo->id;
                $this->reserva_actual->gestion_academica_id = $gestion->id;
                $this->reserva_actual->persona_ci = $this->beneficiario;
                $this->reserva_actual->jefe_lab_cod = Auth::user()->id;

                $this->reserva_actual->save();

                reserva_aula::where('reserva_id', $this->reserva_actual->id)->delete();


                foreach ($this->dias_reservados as $key => $dia_reservado) {

                    reserva_aula::create([
                        //'dias' => $dia_reservado['dias'],
                        'dias' => $dates[$key]->toJson(),
                        'hora_inicio' => $dia_reservado['hora_inicio'],
                        'hora_fin' => $dia_reservado['hora_fin'],
                        'reserva_id' => $this->reserva_actual->id,
                        'aula_id' => $this->laboratorio,
                    ]);
                }


                DB::commit();
                return redirect()->to('/reservas');
            }
        } catch
        (\Exception $e) {
            dd($e);
            DB::rollback();
        }
    }

    public function agregarDias()
    {
       if ($this->verificarDisponiblidad()) {
            $d = '';
            foreach ($this->dias as $dia) {
                $d = $d == '' ? $dia : $d . '-' . $dia;
            }
            $this->dias_reservados->push(['hora_inicio' => $this->hora_inicio, 'hora_fin' => $this->hora_fin, 'dias' => $d]);
            $this->modal = false;
        } else {
            $this->mensaje = 'Ese horario ya esta reservado o es inválido';
        }
    }

    public function eliminarDia($key)
    {
        $this->dias_reservados->forget($key);
    }

    public function verificarDisponiblidad()
    {
        $dates = $this->obtenerFechas($this->dias);
        if ($dates->isEmpty()) {
            return false;
        }
        foreach ($dates as $date) {
            $reserva = reserva::join('reserva_aula', 'reserva_id', '=', 'reserva.id')
                ->where(function ($query) use ($date) {
                    $query->whereJsonContains('dias', $date)
                        ->where('hora_inicio', '>', $this->hora_inicio)
                        ->where('hora_inicio', '<', $this->hora_fin);
                    if (!$this->crear) {
                        $query->where('reserva.id', '!=', $this->reserva_actual->id);
                    }
                })
                ->orWhere(function ($query) use ($date) {
                    $query->whereJsonContains('dias', $date)
                        ->where('hora_fin', '>', $this->hora_inicio)
                        ->where('hora_fin', '<', $this->hora_fin);
                    if (!$this->crear) {
                        $query->where('reserva.id', '!=', $this->reserva_actual->id);
                    }
                })->orWhere(function ($query) use ($date) {
                    $query->whereJsonContains('dias', $date)
                        ->where('hora_inicio', '<=', $this->hora_inicio)
                        ->where('hora_fin', '>=', $this->hora_fin);
                    if (!$this->crear) {
                        $query->where('reserva.id', '!=', $this->reserva_actual->id);
                    }
                })->get();
            if ($reserva == null || $reserva->isNotEmpty()) {
                return false;
            }
        }
        return true;
    }

    public function obtenerFechas($dias)
    {
        $dates = collect([]);
        for ($i = new Carbon($this->fecha_inicio); $i <= new Carbon($this->fecha_fin); $i->addDay()) {
            foreach ($dias as $dia) {
                if ($dia === $i->dayName) {
                    $dates->push($i->toDateString());
                }
            }
        }
        return $dates;
    }

}
