<div>
    <h1>Lista de países</h1>

    <form action="" wire:submit.prevent="agregar">
        <input type="text" placeholder="Escribir nuevo país" wire:model="pais">
        <button type="submit">Enviar</button>
    </form>





    <ul>
        @foreach ($paises as $pais)
            <li>{{ $pais }}</li>
        @endforeach
    </ul>
</div>
