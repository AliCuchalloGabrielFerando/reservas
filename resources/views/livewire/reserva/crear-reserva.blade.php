<div>
    <h2 class="text-2xl font-semibold m-5">Formulario de solicitud de reserva</h2>
    <form class="grid grid-cols-5 gap-4 p-5">

        <div class="col-span-2">
        <x-label for="beneficiario">Beneficiario</x-label>
        <x-selector name="beneficiario" id="beneficiario" type="text"></x-selector>
        </div>

        <div>
            <x-label for="codigo">Código</x-label>
            <x-input name="codigo" id="codigo" type="text"></x-input>
        </div>

        <div class="col-span-2">
            <x-label for="auxiliar">Reservado por el uxiliar</x-label>
            <x-selector name="auxiliar" id="auxiliar">
                <option value="g">hola</option>
            </x-selector>
        </div>

        <div>
            <x-label for="sigla">Sigla de materia</x-label>
            <x-selector name="sigla" id="sigla">
                <option value="g">hola</option>
            </x-selector>
        </div>

        <div>
            <x-label for="grupo">Grupo</x-label>
            <x-selector name="grupo" id="grupo">
                <option value="g">hola</option>
            </x-selector>
        </div>

        <div>
            <x-label for="hora_ini">Hora inicio</x-label>
            <x-input name="hora_ini" id="hora_ini" type="time"></x-input>
        </div>

        <div>
            <x-label for="hora_fin">Hora  fin</x-label>
            <x-input name="hora_fin" id="hora_fin" type="time"></x-input>
        </div>

        <div>
            <x-label for="laboratorio">Laboratorio</x-label>
            <x-selector name="laboratorio" id="laboratorio">
                <option value="" disabled selected>Seleccione uno</option>
                <option value="" >Seleccione 2</option>
            </x-selector>
        </div>
        <div>
            <x-label for="fecha_ini">Fecha  inicio</x-label>
            <x-input name="fecha_ini" id="fecha_ini" type="date"></x-input>
        </div>
        <div>
            <x-label for="fecha_fin">Fecha  fin</x-label>
            <x-input name="fecha_fin" id="fecha_fin" type="date"></x-input>
        </div>

        <div class="col-span-3">
            <x-label for="actividad">Actividad</x-label>
            <x-input name="actividad" id="actividad" type="text"></x-input>
        </div>
    </form>
</div>
