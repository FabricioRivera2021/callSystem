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
                '!bg-orange-300' => session('numeroSeleccionadoForColor') === $numero->numero,
                '!bg-yellow-300' => $numero->paused === true,
                '!bg-red-300' => $numero->canceled === true,
                   ])
                >
                <td class="whitespace-nowrap px-1 py-1 font-medium">
                {{-- ! si el puesto esta sin asignar no puede llamar a nadie -------------------------------------------------------------------------------------------------------}}
                    <button class="rounded bg-blue-400 text-slate-100 px-2 hover:bg-blue-500"
                            wire:click="callNumber({{$numero->numero}})">
                        {{--
                            ! juegan - estado y puesto aqui
                        Dependiendo de que puesto este activo se tiene que mostrar el boton llamar
                        en base al estado del numero
                        --}}
                        {{(session('positionName') === $numero->estados->estados && session('numeroSeleccionado') !== $numero->numero && ($numero->paused === false) && ($numero->canceled === false)) ? 'Llamar' : ''}}
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
                <td class="whitespace-nowrap px-1 py-1 font-semibold text-slate-600" wire:model="currentSelectedNumber">
                    @if($numero->paused === true)
                        <span>Pausado 
                            <button 
                                class="rounded bg-blue-400 text-slate-100 px-2 hover:bg-blue-500"
                                wire:click="retomarNumero({{$numero->numero}}, 'paused')"
                                >
                                Retomar
                            </button>
                        </span>
                    @endif 
                    @if($numero->canceled === true)
                        <span>Cancelado 
                            <button 
                                class="rounded bg-blue-400 text-slate-100 px-2 hover:bg-blue-500"
                                wire:click="retomarNumero({{$numero->numero}}, 'canceled')"
                                >
                                Retomar
                            </button>
                        </span>
                    @endif 
                    @if(session('numeroSeleccionadoForColor') === $numero->numero)
                        <span>En proceso</span>
                    @endif
                </td>
            </tr>
            @empty
                No hay numeros para mostrar
            @endforelse
        </tbody>
    </table>
</div>

{{-- https://phoenixnap.com/kb/how-to-get-the-current-date-and-time-javascript --}}
