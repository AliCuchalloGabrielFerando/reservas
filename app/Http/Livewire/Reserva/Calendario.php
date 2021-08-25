<?php

namespace App\Http\Livewire\Reserva;

use App\Models\aula;
use App\Models\reserva_aula;
use Carbon\Carbon;
use DateTime;
use Livewire\Component;

class Calendario extends Component
{
    public $aula_actual;
    public $semana;
    public $dates;
    public $horario_reservas;


    public function mount($id)
    {
        $this->aula_actual = aula::find($id);
        $this->horario_reservas=collect([]);
    }

    public function render()
    {
        return view('livewire.reserva.calendario');
    }

    public function updated($propertyName)
    {
        if($propertyName=='semana'){
            $this->horario_reservas=collect([]);
            $this->mostrar();
        }
    }

    public function mostrar()
    {
        $week = explode("-", $this->semana);

        $date_start = Carbon::now()->setISODate($week[0], substr($week[1], 1));
        $date_end = Carbon::createFromDate($date_start->toDateString())->endOfWeek();

        $this->dates = collect([]);
        for ($i = $date_start; $i <= $date_end; $i->addDay()) {
            $this->dates->push($i->toDateString());
        }
        $tiempo_inicio = new Carbon('07:00:00');
        $tiempo_fin = new Carbon('24:00:00');
       // $time->addMinutes(15);
      //  dd($time->addMinutes(15)->toTimeString());

        $reservas = collect([]);
        foreach ($this->dates as $date) {
            $data = reserva_aula::select('reserva_aula.*','reserva.actividad')
                ->join('reserva', 'reserva_id', '=', 'reserva.id')
                ->whereJsonContains('dias', $date)
                ->where('aula_id',$this->aula_actual->id)
                ->orderBy('hora_inicio')
                ->get();
            $reservas->push(['date'=>$date,'data'=>$data]);
          //  $this->horario_reservas->push(['date'=>$date,'data'=>collect([])]);
        }

        /*$horas=reserva_aula::select('hora_inicio','hora_fin')
            ->join('reserva', 'reserva_id', '=', 'reserva.id')
            ->whereJsonContains('dias', $date)
            ->where('aula_id',$this->aula_actual->id)
            ->orderBy('hora_inicio')
            ->orderBy('hora_fin')
            ->get();*/
        //dd($horas);


        $col=collect([]);
        for($i=$tiempo_inicio;$i<$tiempo_fin;$i->addMinutes(15)){
            foreach ($reservas as $reserva){
                foreach ($reserva['data'] as $reserva_tiempo){
                    if($reserva_tiempo->hora_inicio==$i->toTimeString()){
                        if($col->isNotEmpty() && $reserva['date']<=$col->last()['date']) {
                            $this->horario_reservas->push($col);
                            $col = collect([]);
                        }
                       // }else {
                        $inicio = Carbon::parse($reserva_tiempo->hora_inicio);
                        $diferencia = Carbon::parse($reserva_tiempo->hora_fin)->diffInMinutes($inicio,true);
                        $span=$diferencia/15;

                        $df=Carbon::parse('07:00:00')->diffInMinutes($inicio,true);
                        $start=$df/15;
                        //dd($filas);
                        $col->push(['start'=>$start+2,'span'=>$span,'date' => (new Carbon($reserva['date']))->dayName, 'data' => $reserva_tiempo]);
                            break;
                       // }
                    }
                }
            }
        }
        if($col->isNotEmpty()){
            $this->horario_reservas->push($col);
        }


       // dd($this->horario_reservas);

    }

}
