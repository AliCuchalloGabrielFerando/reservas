<div>
    <h2 class="text-2xl font-semibold m-5">Formulario de solicitud de reserva</h2>
    <div class="flex flex flex-grow justify-end content-start ml-8 mr-5">
        <p class="text-sm text-gray-500"> las visitas a esta pagina
            son: {{$contador_pagina_reserva_crear->visitas}}</p>
    </div>
    <form class="grid grid-cols-5 gap-4 p-5"  wire:submit.prevent="reservar">

        <div class="col-span-2">
            <x-label for="beneficiario">Beneficiario</x-label>
            <x-selector wire:model="persona" name="beneficiario" id="beneficiario" type="text">
                @foreach($personas as $per)
                    <option value="{{$per->ci}}">{{$per->nombre}}</option>
                @endforeach
            </x-selector>
        </div>



        <div>
            <x-label for="prioridad">Prioridad</x-label>
            <x-selector wire:model="prioridad" name="prioridad" id="prioridad">
                @foreach($prioridades as $pri)
                    <option value="{{$pri->id}}">{{$pri->nombre}}</option>
                @endforeach
            </x-selector>
        </div>
        @if(!$crear)
        <div>
            <x-label for="estado">Estado</x-label>
            <x-selector wire:model="estado" name="estado" id="estado">
                @foreach($estados as $est)
                    <option value="{{$est->id}}">{{$est->nombre}}</option>
                @endforeach
            </x-selector>
        </div>
        @endif

        <div>
            <x-label for="sigla">Materia</x-label>
            <x-selector wire:model="materia" name="sigla" id="sigla">
                <option value="0">Ninguna</option>
            @foreach($materias as $mat)
                    <option value="{{$mat->id}}">{{$mat->nombre}}</option>
                @endforeach
            </x-selector>
        </div>

        <div>
            <x-label for="grupo">Grupo</x-label>
            <x-selector wire:model="grupo" name="grupo" id="grupo">
                <option value="0">Ninguno</option>
                @foreach($grupos as $gru)
                    <option value="{{$gru->id}}">{{$gru->nombre}}</option>
                @endforeach
            </x-selector>
        </div>


        <div>
            <x-label for="laboratorio">Laboratorio</x-label>
            <x-selector wire:model="laboratorio" name="laboratorio" id="laboratorio">
                @foreach($laboratorios as $lab)
                    <option value="{{$lab->id}}">{{$lab->codigo_aula}}</option>
                @endforeach
            </x-selector>
        </div>
        <div>
            <x-label for="fecha_inicio">Fecha inicio</x-label>
            <x-input wire:model="fecha_inicio" min="{{\Carbon\Carbon::now()->toDateString()}}" name="fecha_inicio" id="fecha_inicio" type="date"></x-input>
        </div>
        <div>
            <x-label for="fecha_fin">Fecha fin</x-label>
            <x-input wire:model="fecha_fin"  name="fecha_fin" id="fecha_fin" type="date"></x-input>
        </div>

        <div class="col-span-full">
            <x-label for="actividad">Actividad</x-label>
            <x-text-area wire:model="actividad" name="actividad" id="actividad"></x-text-area>
        </div>
        <div class="flex justify-center col-span-full">
            <x-button> {{$crear?'Reservar':'Guardar'}}</x-button>
        </div>
    </form>

    <div class="flex justify-center">
    <x-button wire:click="$toggle('modal')">Agregar días</x-button>
    </div>

    <div class="flex justify-center p-5">
@foreach($dias_reservados as $key=>$dia_reservado)
        <div class="bg-gray-500 w-48 h-24 text-center text-white rounded-md space-y-3 ">
            <p class="text-xl font-semibold">{{$dia_reservado['hora_inicio'].' - '.$dia_reservado['hora_fin'] }}</p>
            <span>{{$dia_reservado['dias']}}</span>
            <div>
            <x-button wire:click="eliminarDia({{$key}})">Eliminar</x-button>
            </div>
        </div>
    @endforeach
    </div>


    <x-dialog-modal wire:model="modal" wire:click="$toggle('modal')">
        <x-slot name="title">
            Agregar días
        </x-slot>

        <x-slot name="content">
            <form class="space-y-5" wire:submit.prevent="agregarDias">
                <div class="flex justify-center space-x-10">
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="Lu" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Lu</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="Ma" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Ma</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="Mi" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Mi</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="Ju" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Ju</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="Vi" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Vi</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="Sa" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Sa</x-label>
                    </div>
                    <div class="flex flex-col">
                        <x-input wire:model="dias" value="Do" name="dias" type="checkbox"></x-input>
                        <x-label for="dias">Do</x-label>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-label  for="hora_inicio">Hora inicio</x-label>
                        <x-input wire:model="hora_inicio" name="hora_inicio" id="hora_inicio" type="time" step="900" required></x-input>
                    </div>

                    <div>
                        <x-label for="hora_fin">Hora fin</x-label>
                        <x-input wire:model="hora_fin" name="hora_fin" id="hora_fin" type="time" step="900" required></x-input>
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
