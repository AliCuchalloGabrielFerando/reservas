<div>
    <div class="flex justify-center p-5">

    <div>
        <x-label for="semana">Seleccionar semana</x-label>
        <x-input wire:model="semana"  name="semana" id="semana" type="week"></x-input>
    </div>
    </div>
{{--    <div class="flex justify-center p-5">
        @if($semana!=null)
        <x-button wire:click="mostrar">Mostrar calendario</x-button>
        @endif
    </div>--}}


   <div class="grid grid-cols-7 gap-0 justify-items-center  font-semibold">
        <div class="border  border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Lunes</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Martes</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Miércoles</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Jueves</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Viernes</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Sábado</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Domingo</div>
   </div>

       <div class="grid grid-cols-7  grid-flow-row auto-rows-max gap-0 justify-items-center  font-semibold">

       @foreach($horario_reservas as $reserva)

           @foreach($reserva as $r)
               @if($r['date']=='lunes')
                   <x-horario class="col-start-1 row-span-{{$r['span']}} row-start-{{$r['start']}}">
                       <p class="text-xl">{{$r['data']->actividad}}</p>
                       <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                   </x-horario>
               @endif
                   @if($r['date']=='martes')
                       <x-horario class="col-start-2 row-span-{{$r['span']}} row-start-{{$r['start']}}">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='miércoles')
                       <x-horario class="col-start-3 row-span-{{$r['span']}} row-start-{{$r['start']}}">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='jueves')
                       <x-horario class="col-start-4 row-span-{{$r['span']}} row-start-{{$r['start']}}">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='viernes')
                       <x-horario class="col-start-5 row-span-{{$r['span']}} row-start-{{$r['start']}}">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='sábado')
                       <x-horario class="col-start-6 row-span-{{$r['span']}} row-start-{{$r['start']}}">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='domingo')
                       <x-horario class="col-start-7 row-span-{{$r['span']}} row-start-{{$r['start']}}">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                       </x-horario>
                   @endif
           @endforeach
       @endforeach
    </div>

    {{-- The Master doesn't talk, he acts. --}}
</div>
