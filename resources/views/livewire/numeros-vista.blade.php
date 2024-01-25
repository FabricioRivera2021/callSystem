<div>
    <table class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Accion</th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold"><a href="#">Nro.</a></th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Fila</th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold"><a href="#">T. de espera</a></th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Estado</th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Nombre</th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Numero en proceso</th>
            </tr>
        </thead>
        <tbody class="odd">
            @forelse ($numeros as $numero)
            <tr @class([
                'even:bg-gray-50',
                'odd:bg-slate-200',
                'border-b',
                'dark:border-neutral-500',
                '!bg-orange-300' => session('numeroSeleccionado') === $numero->numero,
                   ])
                >
                <td class="whitespace-nowrap px-1 py-1 font-medium">
                {{-- ! si el puesto esta sin asignar no puede llamar a nadie -------------------------------------------------------------------------------------------------------}}
                    <button class="hover:cursor-pointer"
                            wire:click="callNumber({{$numero->numero}})">
                        {{--
                            ! juegan - estado y puesto aqui
                        Dependiendo de que puesto este activo se tiene que mostrar el boton llamar
                        en base al estado del numero
                        --}}
                        {{($canCall === $numero->estados->estados && session('numeroSeleccionado') !== $numero->numero) ? 'Llamar' : ''}}
                    </button>
                </td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->numero}}</td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->filas->filas}}</td>
                <td class="whitespace-nowrap px-1 py-1">
                    <span 
                        class="px-1 text-slate-500 font-semibold" 
                        x-data="clock('{{$numero->created_at}}')" 
                        x-init="startClock()" 
                        x-text="formattedTime">
                    </span>
                </td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->estados->estados}}</td>
                <td class="whitespace-nowrap px-1 py-1">
                    @foreach ($numero->customers as $customer)
                    {{$customer->name}}
                    {{(count($numero->customers) > 1) ? '|' : ''}}
                    @endforeach
                </td>
                <td class="whitespace-nowrap px-1 py-1" wire:model="currentSelectedNumber">
                    {{(session('numeroSeleccionado') === $numero->numero) ? 'en proceso' : ''}}
                </td>
            </tr>
            @empty
                No hay numeros para mostrar
            @endforelse
        </tbody>
    </table>
</div>

{{-- https://phoenixnap.com/kb/how-to-get-the-current-date-and-time-javascript --}}
