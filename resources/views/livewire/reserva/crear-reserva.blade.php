<div>
    <h2 class="text-2xl font-semibold m-5 text-black dark:text-white">Formulario de solicitud de reserva</h2>
    <div class="flex flex flex-grow justify-end content-start ml-8 mr-5">
        <p class="text-sm text-black dark:text-white"> Las visitas a esta página
            son: {{$contador_pagina_reserva_crear->visitas}}</p>
    </div>
    <form class="grid grid-cols-5 gap-4 p-5" wire:submit.prevent="reservar">

        <div class="col-span-2">
            <x-label for="beneficiario">Beneficiario</x-label>
            <x-selector wire:model="beneficiario" name="beneficiario" id="beneficiario" type="text" required>
                @foreach($personas as $per)
                    <option value="{{$per->ci}}">{{$per->nombre}}</option>
                @endforeach
            </x-selector>
        </div>


        <div>
            <x-label for="prioridad">Prioridad</x-label>
            <x-selector wire:model="prioridad" name="prioridad" id="prioridad" required>
                @foreach($prioridades as $pri)
                    <option value="{{$pri->id}}">{{$pri->nombre}}</option>
                @endforeach
            </x-selector>
        </div>
        {{-- @if(!$crear)--}}
        <div>
            <x-label for="estado">Estado</x-label>
            <select class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300"
                    wire:model="estado" name="estado" id="estado" {{$estadoMostrar}}>
                @foreach($estados as $est)
                    <option value="{{$est->id}}">{{$est->nombre}}</option>
                @endforeach
            </select>
        </div>
        {{--@endif--}}

        <div>
            <x-label for="sigla">Materia</x-label>
            <x-selector wire:model="materia" name="sigla" id="sigla" required>
                <option value="0">Ninguna</option>
                @foreach($materias as $mat)
                    <option value="{{$mat->id}}">{{$mat->nombre}}</option>
                @endforeach
            </x-selector>
        </div>

        <div>
            <x-label for="grupo">Grupo</x-label>
            <x-selector wire:model="grupo" name="grupo" id="grupo" required>
                <option value="0">Ninguno</option>
                @foreach($grupos as $gru)
                    <option value="{{$gru->id}}">{{$gru->nombre}}</option>
                @endforeach
            </x-selector>
        </div>


        <div>
            <x-label for="laboratorio">Laboratorio</x-label>
            <x-selector wire:model="laboratorio" name="laboratorio" id="laboratorio" required>
                @foreach($laboratorios as $lab)
                    <option value="{{$lab->id}}">{{$lab->codigo_aula}}</option>
                @endforeach
            </x-selector>
        </div>
        <div>
            <x-label for="fecha_inicio">Fecha inicio</x-label>
            <x-input wire:model="fecha_inicio" min="{{\Carbon\Carbon::now()->toDateString()}}" name="fecha_inicio"
                     id="fecha_inicio" type="date" required></x-input>
        </div>
        @if($fecha_inicio!=null)
            <div>
                <x-label for="fecha_fin">Fecha fin</x-label>
                <x-input wire:model="fecha_fin" min="{{$fecha_inicio}}" name="fecha_fin" id="fecha_fin" type="date"
                         required></x-input>
            </div>
        @endif

        <div class="col-span-full">
            <x-label for="actividad">Actividad</x-label>
            <x-text-area wire:model="actividad" name="actividad" id="actividad" required></x-text-area>
        </div>
        <div class="flex justify-center col-span-full">
            <x-button> {{$crear?'Reservar':'Guardar'}}</x-button>
        </div>
    </form>

    <div class="flex justify-center">
        @if($fecha_inicio!=null && $fecha_fin!=null)
            <x-button wire:click="$toggle('modal')">Agregar días</x-button>
        @endif

    </div>

    <div class="flex justify-center p-5 space-x-3">
        @foreach($dias_reservados as $key=>$dia_reservado)
            <div class="bg-gray-500 w-48 h-24 text-center text-white rounded-md space-y-3 ">
                <p class="text-xl font-semibold">{{$dia_reservado['hora_inicio'].' - '.$dia_reservado['hora_fin'] }}</p>
                <div class="flex justify-center">
                    <p class="w-40 text-center truncate ">{{$dia_reservado['dias']}}</p>
                </div>
                <div>
                    <x-danger-button wire:click="eliminarDia({{$key}})">Eliminar</x-danger-button>
                </div>
            </div>
        @endforeach
    </div>
    <x-dialog-modal wire:model="modal" wire:click="$toggle('modal')">
        <x-slot name="title">
            Agregar días
        </x-slot>

        <x-slot name="content">
            @if($mensaje!==null || $mensaje!='')
                <p class="text-center text-red-500">{{$mensaje}}</p>
            @endif
            <form class="space-y-5" wire:submit.prevent="agregarDias">
                <div class="flex justify-center space-x-10">
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="lunes" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Lu</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="martes" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Ma</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="miércoles" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Mi</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="jueves" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Ju</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="viernes" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Vi</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="sábado" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Sa</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="domingo" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Do</x-label>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-label for="hora_inicio">Hora inicio</x-label>
                        <x-input wire:model="hora_inicio" name="hora_inicio" id="hora_inicio" type="time" step="900"
                                 required></x-input>
                    </div>

                    <div>
                        <x-label for="hora_fin">Hora fin</x-label>
                        <x-input wire:model="hora_fin" name="hora_fin" min="{{$hora_inicio}}" id="hora_fin" type="time"
                                 step="900" required></x-input>
                    </div>
                </div>
                <div class="flex justify-center">
                    <x-button>Agregar</x-button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>
</div>
