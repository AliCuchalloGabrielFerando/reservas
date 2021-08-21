<div>
    <div class="flex justify-center p-5">

    <div>
        <x-label for="semana">Seleccionar semana</x-label>
        <x-input wire:model="semana"  name="semana" id="semana" type="week"></x-input>
    </div>
    </div>
    <div class="flex justify-center p-5">
        <x-button wire:click="mostrar">Mostrar calendario</x-button>
    </div>

    {{-- The Master doesn't talk, he acts. --}}
</div>
