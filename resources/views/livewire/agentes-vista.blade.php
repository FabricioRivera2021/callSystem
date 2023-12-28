<div>
    <table class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500 whitespace-nowrap">
            <tr>
            <th scope="col" class="px-2 py-4">Accion</th>
            <th scope="col" class="px-2 py-4">Agente</th>
            <th scope="col" class="px-2 py-4">Rol</th>
            <th scope="col" class="px-2 py-4">Fila activa</th>
            <th scope="col" class="px-2 py-4">Numero activo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
            <tr class="border-b dark:border-neutral-500">
                <td class="whitespace-nowrap px-2 py-1 font-semibold"><a class="hover:text-blue-400" href="#">Pedir numero</a></td>
                <td class="whitespace-nowrap px-2 py-1 font-medium">{{$usuario->name}}</td>
                <td class="whitespace-nowrap px-2 py-1">{{ isset($usuario->roles) ? $usuario->roles->roles : '' }}</td>
                <td class="whitespace-nowrap px-2 py-1">{{ isset($usuario->numero->filas->filas) ? $usuario->numero->filas->filas : 'Sin asignar' }}</td>
                <td class="whitespace-nowrap px-2 py-1">{{ isset($usuario->numero->numero) ? $usuario->numero->numero : '---' }}</td>
            </tr>
            @empty
                <p>No hay data</p>
            @endforelse
        </tbody>
    </table>
</div>
