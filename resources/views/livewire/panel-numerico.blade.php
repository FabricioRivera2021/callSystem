<div>
    <div class="w-screen h-screen flex flex-col justify-center items-center">

        <h1 class="text-xl uppercase font-semibold text-slate-500 mb-1">Ingrese su documento</h1>
        <h2 class="text-sm font-semibold text-slate-500 mb-10">Sin puntos ni guiones</h2>

        <div class="w-3/5 max-w-sm grid grid-cols-3 grid-rows-4 gap-1">
            <div wire:click="appendNumber(1)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">1</div>
            <div wire:click="appendNumber(2)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">2</div>
            <div wire:click="appendNumber(3)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">3</div>
            <div wire:click="appendNumber(4)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">4</div>
            <div wire:click="appendNumber(5)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">5</div>
            <div wire:click="appendNumber(6)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">6</div>
            <div wire:click="appendNumber(7)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">7</div>
            <div wire:click="appendNumber(8)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">8</div>
            <div wire:click="appendNumber(9)" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">9</div>
            <div wire:click="appendNumber(0)" class="col-span-2 p-5 text-4xl bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center">0</div>
            <div wire:click="appendNumber(0)" class="col-span-1 p-5 text-4xl bg-orange-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center"><</div>

        </div>

        <input class="my-5 px-5 py-2 border rounded-sm" type="text" wire:model="displayNumber" readonly>
        <div>
            <button wire:click="clear" class="border rounded-xs bg-blue-400 px-3 col-span-3 py-1 font-semibold text-slate-100">Cancelar</button>
            <button wire:click="save" class="border rounded-xs bg-blue-400 px-3 col-span-3 py-1 font-semibold text-slate-100">Siguiente</button>
        </div>
    
    </div>
</div>
