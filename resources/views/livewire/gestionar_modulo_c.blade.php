<div  x-data="{open: false}">
    <div class=" flex justify-center">
        <h1 class="text-center text-3xl mt-10 text-base-900 border-1 border-blue-100">Gestión de Módulos</h1>
    </div>
    @if($otraPagina =="actual")
        <div class="p-8 flex flex-wrap items-center justify-center">
            @foreach($modulos as $modulo)
            <div class="flex-shrink-0 mx-6 relative overflow-hidden bg-purple-500 rounded-lg max-w-xs shadow-lg">
                <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                    <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                    <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                </svg>
                <div class="relative pt-10 px-10 flex items-center justify-center">
                    <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;"></div>
                    <img class="relative w-40" src="https://img.europapress.es/fotoweb/fotonoticia_20170907105729_1024.jpg" alt="">
                </div>
                <div class="relative text-white px-6 pb-6 mt-6">
                    <span class="block font-semibold text-xl">Módulo {{$modulo->nro}}</span>
                    <br>
                        <div class="flex justify-between">
                        <button wire:click="irAulas({{$modulo->id}})" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ver Aulas
                        </button>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div x-data="{ open: false }">
                                    <button
                                        @click="open = true"
                                        class="text-white inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Eliminar
                                    </button>
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
                                                        wire:click="eliminarMod({{$modulo->id}})">
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
            <button wire:click="crear" type="button"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Crear Módulo
            </button>
        </div>
        <div class="bg-white px-4 py-6 border-t border-gray-200 sm:px-6">
            {{ $modulos->links() }}
        </div>
    @elseif($otraPagina =="crear")
    <div class="mt-10 sm:mt-0">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="crearModulo">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Número</label>
                                <input wire:model="numero" type="number" name="numero" id="numero" autocomplete="name" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Nombre de Facultad</label>
                                <input wire:model="facultadNombre" type="text" name="facultadNombre" id="facultadNombre" readonly autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Guardar
                        </button>
                        <button wire:click="cancelar" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancelar
                        </button>
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
