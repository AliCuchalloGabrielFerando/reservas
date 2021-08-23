<div x-data="{open: false}">
   @if($otraPagina == "actual")
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-1">
            <div class="py-2 align-middle inline-block min-w-full sm:px-4 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-800 sm:rounded-lg p-2">
                    <div class="flex space-x-5 mb-3">
                    <input wire:model="search"
                           class="form-input rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-3 shadow-sm mt-1 block w-full "
                           type="text"
                           placeholder="Buscar..."
                        >
                    <select wire:model="nrosPagina"
                            class="form-input rounded-md shadow-sm mt-1 block outline-none text-gray-500">
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
                    @if($usuarios->count())
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha Registro
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Usuario
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rol
                            </th>
                            <th scope="col" class="relative px-5 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($usuarios as $usuario )
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm text-gray-500">
                                            {{$usuario->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    {{$usuario->fechaR}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                     {{$usuario->usuario}}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    @if($usuario->docente_cod)
                                        Docente
                                    @endif
                                    @if($usuario->auxiliar_cod)
                                        Auxiliar
                                    @endif
                                    @if($usuario->jefe_lab_cod)
                                        Jefe de Laboratorio
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button @click="open = !open" wire:click="$set('idActual',{{$usuario->id}})"
                                        class="text-red-900">
                                        Eliminar
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a wire:click="irEditar({{$usuario->id}})" href="#" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                        <div class="bg-white px-4 py-6 border-t border-gray-200 sm:px-6">
                            {{ $usuarios->links() }}
                        </div>
                        <div class="content-start content-end">
                        <button wire:click="crear" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear Usuario
                        </button>
                        </div>
                    @else
                        <div class="bg-white px-4 py-6 border-t border-gray-200 sm:px-6">
                            No hay resultados para la busqueda "{{$search}}" en la pagina {{ $page }} al
                            mostrar {{$nrosPagina}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @elseif ($otraPagina == "crear")
        <div class="mt-10 sm:mt-0">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="guardarCrear">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input wire:model="crearNombre" type="text" name="first-name" id="first-name" autocomplete="name" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Usuario</label>
                                    <input wire:model="crearUsuario" type="text" name="usuario" id="usuario" autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Correo</label>
                                    <input wire:model="crearEmail" type="email" name="email" id="email" autocomplete="user" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Contraseña</label>
                                    <input wire:model="crearPass" type="password" name="password" id="password" autocomplete="password" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Fecha Registro</label>
                                    <input wire:model="crearFechaR" type="date" name="date" id="date" autocomplete="date" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Alta_baja</label>
                                    <input wire:model="alta_baja" type="text" name="alta_baja" id="alta_baja" autocomplete="alta_baja" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Id de Grupo</label>
                                    <input wire:model="grupoId" type="text" name="grupoId" id="grupoId" autocomplete="grupoId" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Codigo de Docente</label>
                                    <input wire:model="docenteCod" type="text" name="grupoId" id="grupoId" autocomplete="grupoId" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Codigo de JefeLab</label>
                                    <input wire:model="jefeLabCod" type="text" name="grupoId" id="grupoId" autocomplete="grupoId" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Codigo de Auxiliar</label>
                                    <input wire:model="auxiliarCod" type="text" name="grupoId" id="grupoId" autocomplete="grupoId" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
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
    @else
        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit.prevent="editar">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input wire:model="nuevoNombre" type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">Usuario</label>
                                        <input wire:model="nuevoUsuario" type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
                                    </div>

                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="email-address" class="block text-sm font-medium text-gray-700">Contraseña</label>
                                        <input wire:model="nuevoPass" type="password" name="email-address" id="email-address" autocomplete="email" class="mt-1 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 p-2 block w-full shadow-sm sm:text-sm border border-gray-300">
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




