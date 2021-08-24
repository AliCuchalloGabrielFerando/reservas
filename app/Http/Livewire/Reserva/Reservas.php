<?php

namespace App\Http\Livewire\Reserva;

use App\Models\aula;
use App\Models\reserva;
use Carbon\Carbon;
use Livewire\Component;

class Reservas extends Component
{
    public $reservas;
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

        $this->reservas=reserva::select('reserva.*','nombre','aula.codigo_aula')
            ->join('reserva_aula','reserva_id','=','reserva.id')
            ->join('aula','aula_id','=','aula.id')
            ->join('estado','estado_id','=','estado.id')
            ->whereDate('reserva.fecha_fin','>=',$date)
            ->distinct()
            ->get();



        return view('livewire.reserva.reservas');
    }
}
