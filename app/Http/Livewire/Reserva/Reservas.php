<?php

namespace App\Http\Livewire\Reserva;

use App\Models\aula;
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

        $this->aulas=aula::select('aula.*','reserva.id as reserva_id')
            ->join('reserva_aula','aula_id','=','aula.id')
            ->join('reserva','reserva_id','=','reserva.id')
            ->whereDate('reserva.fecha_fin','>=',$date)
            ->distinct()
            ->get();



        return view('livewire.reserva.reservas');
    }
}
