<div>
    <div class="w-screen h-screen flex flex-col justify-start items-center pt-20">
        <h1 class="text-xl uppercase font-semibold text-slate-500 mb-1">Ingrese su documento</h1>
        <h2 class="text-sm font-semibold text-slate-500 mb-10">Sin puntos ni guiones</h2>

        {{-- flash messages --}}
        <x-numeric-panel-msg />

        <div class="w-3/5 max-w-sm grid grid-cols-3 grid-rows-4 gap-1">
            @for ($i = 1; $i < 10; $i++)
                <div wire:click="appendNumber({{$i}})" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">{{$i}}</div>
            @endfor
            <div wire:click="appendNumber(0)" class="col-span-2 p-5 text-4xl bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center">0</div> 
            <div wire:click="deleteNumber" class="col-span-1 p-5 text-4xl bg-orange-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center"><</div>
        </div>

        <input class="my-5 px-5 py-2 border rounded-sm w-3/5 max-w-sm antialiased text-slate-400 text-center font-semibold bg-slate-50" type="text" wire:model="displayNumber" readonly>       
        
        <div class="flex flex-col gap-1 w-3/5 max-w-sm">
            <button wire:click="clear" class="border rounded-xs bg-red-400 px-3 col-span-3 py-1 font-semibold text-slate-100">Cancelar</button>
            <button wire:click="add" class="border rounded-xs bg-blue-400 px-3 col-span-3 py-1 font-semibold text-slate-100">Agregar Cedula</button>
        </div>
        
        <div class="w-3/5 max-w-sm" 
            x-data="{ showFinalizar: false }"
            x-init="@this.on('numberAdded', () => { showFinalizar = true });
                    @this.on('clearDisplay', () => { showFinalizar = false });"
        >
            @forelse ($cedulas as $key => $cedula)
            <div class="w-full flex items-center justify-start bg-slate-100">
                <div class="pl-3 py-1 text-slate-500 flex w-full justify-between">
                    <div><p class="text-slate-500">{{$cedula['ci']}} - {{$cedula['name']}}</p></div>
                    <div><button wire:click="deleteCi({{$key}})" class="border rounded bg-red-400 shadow-sm text-slate-100 px-2 mr-3">Eliminar</button></div>
                </div>
            </div>
            @empty
            <p></p>
            @endforelse
            <button wire:click="save" x-show="showFinalizar" class="w-full border rounded-xs bg-blue-500 px-3 col-span-3 py-0.5 my-3 text-slate-100 text-sm">Finalizar</button>
            <button @click="$dispatch('foo')">Boton</button>
        </div>
    </div>
</div>