<div  x-data="{open: false}">
    <div class=" flex justify-center">
        <h1 class="text-center text-3xl dark:text-white mt-10 border-1 border-blue-100">Gestión de Aulas</h1>
    </div>
    @if($otraPagina =="actual")
        <div class="flex space-x-5 mb-3">
            <input wire:model="search"
                   class="form-input rounded-lg border-black border-2 dark:border-white focus:outline-none focus:ring-1 focus:ring-blue-400 p-3 shadow-sm mt-1 block w-full "
                   type="text"
                   placeholder="Buscar..."
            >
            <select wire:model="nrosPagina"
                    class="form-input rounded-md border-black border-2 dark:border-white shadow-sm mt-1 block outline-none text-gray-500">
                <option value="3"> 3 por página</option>
                <option value="5"> 5 por página</option>
                <option value="10"> 10 por página</option>
            </select>
            @if($search !== '')
                <button wire:click ="clear" class="form-input rounded-md shadow-sm mt-1 block outline-none text-gray-500">
                    X
                </button>
            @endif
        </div>
        <div class="p-8 flex flex-wrap items-center justify-center">
            @foreach($aulas as $aula)
                <div class="flex-shrink-0 mx-6 relative overflow-hidden bg-indigo-900 dark:bg-blue-300 rounded-lg max-w-xs shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                        <img class="relative w-40" src="https://img.europapress.es/fotoweb/fotonoticia_20170907105729_1024.jpg" alt="">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="text-white dark:text-black block font-semibold text-xl">Aula {{$aula->codigo_aula}}</span>
                        <br>
                        <div class="flex justify-between">
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div x-data="{ open: false }">
                                    <button
                                        @click="open = true"
                                        class="text-white dark:text-black inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Eliminar
                                    </button>
                                    <a href="{{route('reserva.calendario',['id'=>$aula->id])}}" type="button" class="text-white dark:text-black inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Ver Calendario
                                    </a>
                                    <div
                                        x-show="open"
                                        class="z-50 fixed top-0 left-0 w-full h-screen flex justify-center items-center">
                                        <div class="absolute top-0 left-0 w-full h-screen bg-black opacity-60"
                                             x-show="open"
                                             @click="open = false">
                                        </div>
                                        <div
                                            x-show="open"
                                            class="text-black flex flex-col rounded-lg shadow-lg overflow-hidden bg-white w-3/5 h-3/5 z-10">
                                            <div class="p-6 border-b">
                                                <h2 id="modal1_label">¿Estás Seguro de Eliminar?</h2>
                                            </div>
                                            <div class="p-6">
                                                <button class="border-2 border-blue-500" @click="open = false"
                                                        wire:click="eliminarAula({{$aula->id}})">
                                                    Si
                                                </button>
                                                <button class="border-2 border-blue-500" @click="open = false">
                                                    No
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-end">
            <div class="flex flex flex-grow justify-start content-start ml-8">
                <p class="text-sm text-black dark:text-white"> Las visitas a esta página
                    son: {{$contador_pagina_aula_vista->visitas}}</p>
            </div>
            <button wire:click="crear" type="button"
                    class="text-white dark:text-black inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-900 dark:bg-blue-300 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Crear Aula
            </button>
        </div>
        <div class="bg-gray-300 dark:bg-gray-900 px-4 py-6 border-t border-gray-200 sm:px-6">
            {{ $aulas->links() }}
        </div>
    @elseif($otraPagina =="crear")
        <div class="mt-10 sm:mt-0">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="crearAula">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-gray-100 dark:bg-gray-900 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-black dark:text-white">Usuario</label>
                                    <input wire:model="usuario" readonly type="text" name="usuario" id="usuario" required autocomplete="name" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-black">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-black dark:text-white">Fecha de Registro</label>
                                    <input wire:model="fechaR" type="date" name="fechaR" id="fechaR"  required autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-black">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-black dark:text-white">Alta_Baja</label>
                                    <input wire:model="alta_baja" type="text" name="alta_baja" id="alta_baja"  maxlength="6" required autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-black">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-black dark:text-white">Descripción de ubicación</label>
                                    <input wire:model="descripcion_de_ubicacion" type="text" name="descripcion_de_ubicacion" id="descripcion_de_ubicacion" required autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-black">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-black dark:text-white">Capacidad</label>
                                    <input wire:model="capacidad" type="number" name="capacidad" id="capacidad" required autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-black">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-black dark:text-white">Código de Aula</label>
                                    <input wire:model="codigo_aula" type="number" name="codigo_aula" id="codigo_aula" required autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-black">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-black dark:text-white">Nombre de Tipo de Aula</label>
                                    <select
                                        class="form-input rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-3 shadow-sm mt-1 block w-full border border-black"
                                        wire:model="tipo_id"  name="tipo_id" id="tipo_id" required>
                                        <option value="" selected>Elija el tipo de aula </option>
                                        @foreach($tipos_aulas as $tip)
                                            <option value="{{$tip->id}}">{{$tip->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-black dark:text-white">Número de Módulo</label>
                                    <input wire:model="moduloNumero" type="number" name="moduloNumero" id="moduloNumero" required readonly autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-black">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="text-white dark:text-black bg-indigo-900 dark:bg-blue-300 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Guardar
                            </button>
                            <button wire:click="cancelar" type="button" class="text-white dark:text-black bg-indigo-900 dark:bg-blue-300 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Cancelar
                            </button>
                            <div class="flex flex flex-grow justify-start content-start ml-8">
                                <p class="text-sm text-black"> Las visitas a esta página
                                    son: {{$contador_pagina_aula_crear->visitas}}</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <div x-show="open"
         class="absolute z-20 top-0 left-0 flex items-center justify-center w-full h-full bg-black bg-opacity-60">
        <div
            class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-white w-3/5 h-3/5 z-10">
            <div class="p-6 border-b">
                <h2 id="modal1_label">¿Estás Seguro de Eliminar?</h2>
            </div>
            <div class="p-6">
                <button class="border-2 border-blue-500" @click="open = false"
                        wire:click="eliminarPag()">
                    Si
                </button>
                <button class="border-2 border-blue-500" @click="open = false">
                    No
                </button>
            </div>
        </div>
    </div>
</div>
