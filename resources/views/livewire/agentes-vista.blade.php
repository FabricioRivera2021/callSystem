<div>
    <table class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500 whitespace-nowrap">
            <tr>
            <th scope="col" class="px-2 py-4">Agente</th>
            <th scope="col" class="px-2 py-4">Posición</th>
            <th scope="col" class="px-2 py-4">Fila activa</th>
            <th scope="col" class="px-2 py-4">Numero activo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
            <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-2 py-1 font-medium">{{$usuario->name}}</td>
                <td class="whitespace-nowrap px-2 py-1">{{ isset($usuario) ? $usuario->positions->position : '' }}</td>
                <td class="whitespace-nowrap px-2 py-1">{{ $usuario->numeros->filas->filas ?? 'Sin asignar' }}</td>
                <td class="whitespace-nowrap px-2 py-1">{{ isset($usuario->numeros->numero) ? $usuario->numeros->numero : '---' }}</td>
            </tr>
            @empty
                <p>No hay data</p>
            @endforelse
        </tbody>
    </table>
</div>
