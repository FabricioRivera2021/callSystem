<div>
    <div class="w-screen h-screen flex justify-center items-center">
        <form class="grid grid-cols-3 grid-rows-4 gap-1" wire:submit="save">
            <div wire:click="appendNumber(1)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">1</div>
            <div wire:click="appendNumber(2)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">2</div>
            <div wire:click="appendNumber(3)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">3</div>
            <div wire:click="appendNumber(4)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">4</div>
            <div wire:click="appendNumber(5)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">5</div>
            <div wire:click="appendNumber(6)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">6</div>
            <div wire:click="appendNumber(7)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">7</div>
            <div wire:click="appendNumber(8)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">8</div>
            <div wire:click="appendNumber(9)" class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">9</div>
            <div wire:click="appendNumber(0)" class="col-span-3 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center">0</div>

            <input type="text" wire:model="displayNumber" readonly>

            <button wire:click="save" class="border rounded-xs bg-blue-400 w-full col-span-3 py-1 font-semibold text-slate-100">Siguiente</button>
        </form>
    </div>
</div>
