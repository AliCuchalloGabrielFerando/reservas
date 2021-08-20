<div class="p-10">
<div class="flex justify-center">
<x-a class="" href="{{route('reserva.crear')}}">
    {{'Reservar'}}</x-a>
</div>
    @foreach($aulas as $aula)
        <x-a href="{{route('reserva.crear',['id'=>$aula->reserva_id])}}" class="flex flex-col space-y-3">
            <span>
                Laboratorio {{$aula->codigo_aula}}
            </span>
            <span>
                {{$aula->hora_inicio.' - '.$aula->hora_fin}}
            </span>
            <span>
               {{$aula->fecha_inicio.' - '.$aula->fecha_fin}}
            </span>
        </x-a>
    @endforeach
</div>
