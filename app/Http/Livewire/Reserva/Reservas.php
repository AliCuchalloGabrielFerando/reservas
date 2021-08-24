<?php

namespace App\Http\Livewire\Reserva;

use App\Models\aula;
use App\Models\reserva;
use Carbon\Carbon;
use Livewire\Component;

class Reservas extends Component
{
    public $aulas;
    public $buscar;

    public function render()
    {
        $date=Carbon::now('America/La_Paz')->toDateString();

        /**
         * nombre de dia
         * Carbon::now('America/La_Paz')->locale('es')->dayName;
         */

/*        $reservas=reserva::
            join('reserva_aula','reserva_id','=','reserva.id')
            ->whereJsonContains('reserva_aula.dias', '2021-08-28')
            ->get();
        dd($reservas);*/

        $this->aulas=aula::select('aula.*')
            ->join('reserva_aula','aula_id','=','aula.id')
            ->join('reserva','reserva_id','=','reserva.id')
            ->join('estado','estado_id','=','estado.id')
            ->whereDate('reserva.fecha_fin','>=',$date)
            ->where('estado.nombre','Aceptado')
            ->distinct()
            ->get();



        return view('livewire.reserva.reservas');
    }
}
