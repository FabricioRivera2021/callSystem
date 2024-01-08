<div>
    <table wire:poll class="min-w-full text-left text-sm font-light">
        <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Accion</th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold"><a href="#">Nro.</a></th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Fila</th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold"><a href="#">T. de espera</a></th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Estado</th>
            <th scope="col" class="px-1 py-4 text-slate-500 font-semibold">Nombre</th>
            </tr>
        </thead>
        <tbody class="odd">
            @forelse ($numeros as $numero)
            <tr class="even:bg-gray-50 odd:bg-slate-200 border-b dark:border-neutral-500" wire:key="{{ $numero->id }}">
                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->numero}}</td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->filas->filas}}</td>
                <td class="whitespace-nowrap px-1 py-1">
                    <span 
                        class="px-1 text-slate-500 font-semibold" 
                        x-data="clock('{{$numero->created_at}}')" 
                        x-init="$watch(startClock())" 
                        x-text="formattedTime">
                    </span>
                </td>
                <td class="whitespace-nowrap px-1 py-1">{{$numero->estados->estados}}</td>
                @foreach ($numero->customers as $customer)
                    <td class="whitespace-nowrap px-1 py-1">{{$customer->name}}</td>
                @endforeach
            </tr>
            @empty
                No hay numeros para mostrar
            @endforelse
        </tbody>
    </table>
</div>


