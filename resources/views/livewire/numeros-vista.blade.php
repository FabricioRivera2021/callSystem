<div>
    <table class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
            <th scope="col" class="px-1 py-4">Accion</th>
            <th scope="col" class="px-1 py-4"><a href="#">Nro.</a></th>
            <th scope="col" class="px-1 py-4">Fila</th>
            <th scope="col" class="px-1 py-4"><a href="#">T. de espera</a></th>
            <th scope="col" class="px-1 py-4">Estado</th>
            <th scope="col" class="px-1 py-4">Nombre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($numeros as $numero)
            <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->numero}}</td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->filas->filas}}</td>
                <td class="whitespace-nowrap px-1 py-1"><span x-data="clock('{{$numero->created_at}}')" x-init="startClock()" x-text="formattedTime"></span> </td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->estados->estados}}</td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->customers->name}}</td>
            </tr>
            @empty
                No hay numeros para mostrar
            @endforelse
        </tbody>
    </table>
</div>
