<div>
    <div class="flex flex-col justify-center space-y-5">

            <div class="flex justify-center">
                <div class="flex justify-center items-end">
                    <div>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 fill-current text-blue-600"
                             viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-center text-3xl mt-10 text-base-900 border-1 border-blue-100">Generar
                            Reporte</h1>

                    </div>
                </div>
            </div>

            <div class="flex-col justify-center">
                <div class="flex justify-center items-end space-x-1">


                    <div>
                        <x-label class="flex justify-center" for="fecha_inicio">Fecha inicio</x-label>
                        <x-input wire:model="fecha_inicio" wire:click="$emit('habilitar')"
                                 name="fecha_inicio" id="fecha_inicio" type="date"></x-input>
                    </div>
                    <div>
                        <x-label class="flex justify-center" for="fecha_fin">Fecha fin</x-label>
                        <x-input wire:model="fecha_fin" wire:click="$emit('habilitar')"
                                 name="fecha_fin" id="fecha_fin" type="date"></x-input>
                    </div>
                </div>

            </div>
            <div  @if(!$bandera) class="invisible flex justify-center space-x-3" @endif class="flex justify-center space-x-3">
                <button wire:click="descargar"  type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Descargar
                </button>
                <a href="{{route('ver',['fecha_inicio'=>$fecha_i,'fecha_fin'=>$fecha_f])}}" target="_blank"  hidden  class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Ver
                </a>

            </div>
        <div class="flex flex flex-grow justify-start content-start ml-8">
            <p class="text-sm text-gray-500"> las visitas a esta pagina
                son: {{$contador_pagina_reporte_vista->visitas}}</p>
        </div>



    </div>

</div>
