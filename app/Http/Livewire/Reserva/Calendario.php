<?php

namespace App\Http\Livewire\Reserva;

use App\Models\aula;
use Carbon\Carbon;
use DateTime;
use Livewire\Component;

class Calendario extends Component
{
    public $aula_actual;
    public $semana;
    public $dates;

    public function mount($id){
        $this->aula_actual=aula::find($id);
    }

    public function render()
    {
        return view('livewire.reserva.calendario');
    }


    public function mostrar(){
        $week=explode("-", $this->semana);

        $date_start=Carbon::now()->setISODate($week[0],substr($week[1],1));
        $date_end=Carbon::createFromDate($date_start->toDateString())->endOfWeek();

        $this->dates=collect([]);
        for ($i = $date_start; $i <= $date_end; $i->addDay()) {
            $this->dates->push($i->toDateString());
        }

    }
}
