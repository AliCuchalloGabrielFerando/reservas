<div class="p-10 space-x-3 space-y-3">
<div class="flex justify-center">
<x-a  href="{{route('reserva.crear')}}">
    {{'Reservar'}}</x-a>
</div>
    @foreach($reservas as $reserva)
        @if( isset(auth()->user()->jefe_lab_cod))
        <x-a href="{{route('reserva.crear',['id'=>$reserva->id])}}" class="flex flex-col space-y-3 w-48">
            <span>
                Laboratorio {{$reserva->codigo_aula}}
            </span>

            <span>
              {{$reserva->actividad}}
            </span>
            @if($reserva->nombre=='Aceptado')
                <button class="px-3 py-2 bg-white text-black truncate w-full">
                    {{$reserva->nombre}}
                </button>
            @else
                <button class="px-3 py-2 bg-red-500 w-full">
                    {{$reserva->nombre}}
                </button>
            @endif
        </x-a>
    @endforeach


</div>
