<div class="p-5">
    <div class="flex justify-center mb-5">

    <div>
        <x-label for="semana">Seleccionar semana</x-label>
        <x-input wire:model="semana"  name="semana" id="semana" type="week"></x-input>
    </div>
    </div>


   <div class="grid grid-cols-7 gap-0 justify-items-center  font-semibold border border-black">
        <div class="border  border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Lunes</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Martes</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Miércoles</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Jueves</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Viernes</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Sábado</div>
        <div class="border border-black bg-yellow-800 text-center text-white font-semibold uppercase w-full">Domingo</div>
   </div>

       <div class="grid grid-cols-7 grid-flow-row auto-rows-max gap-0 justify-items-center  border border-black font-semibold" style="grid-template-rows: repeat(96, minmax(0, 1fr));">
       @foreach($horario_reservas as $reserva)


           @foreach($reserva as $r)

                   @if($r['date']=='lunes')
                       <x-horario class="row-span-{{$r['span']}} row-start-{{$r['start']}} col-start-1">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                           <p >{{$r['data']->nombre}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='martes')
                       <x-horario class="row-span-{{$r['span']}} row-start-{{$r['start']}} col-start-2 ">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                           <p >{{$r['data']->nombre}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='miércoles')
                       <x-horario class="row-span-{{$r['span']}} row-start-{{$r['start']}} col-start-3 ">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                           <p >{{$r['data']->nombre}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='jueves')
                       <x-horario class="row-span-{{$r['span']}} row-start-{{$r['start']}} col-start-4 ">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                           <p >{{$r['data']->nombre}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='viernes')
                       <x-horario class="row-span-{{$r['span']}} row-start-{{$r['start']}} col-start-5 ">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                           <p >{{$r['data']->nombre}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='sábado')
                       <x-horario class=" row-span-{{$r['span']}} row-start-{{$r['start']}} col-start-6">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                           <p >{{$r['data']->nombre}}</p>
                       </x-horario>
                   @endif
                   @if($r['date']=='domingo')
                       <x-horario class="row-span-{{$r['span']}} row-start-{{$r['start']}} col-start-7">
                           <p class="text-xl">{{$r['data']->actividad}}</p>
                           <p >{{$r['data']->hora_inicio.' - '.$r['data']->hora_fin}}</p>
                           <p >{{$r['data']->nombre}}</p>
                       </x-horario>
                   @endif
           @endforeach
       @endforeach
    </div>

    {{-- The Master doesn't talk, he acts. --}}
</div>
