<div>
    <div class="w-full max-w-xs align-content-center">
        <form wire:submit.prevent="logear" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Usuario
                </label>
                <input wire:model="usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Usuario">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Contraseña
                </label>
                <input wire:model="password" class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Contraseña">
                <p class="text-red-500 text-xs italic">Ingrese su contraseña.</p>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Ingresar
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                    Olvidó su Contraseña?
                </a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;2021 Tecnología Web - Grupo11SC.
        </p>
    </div>
    <div>
        @if ($user)
        {{$user->nombre}}
        @endif
        <br>
        {{$mensaje}}
    </div>
</div>
