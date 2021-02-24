<div>
    <h1>Lista de países</h1>

    <input type="text" placeholder="Escribir nuevo país" wire:model="pais">

    <button wire:click="agregar">Enviar</button>

    <ul>
        @foreach ($paises as $pais)
            <li>{{ $pais }}</li>
        @endforeach
    </ul>
</div>
