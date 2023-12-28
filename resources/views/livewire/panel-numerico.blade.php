<div>
    <div class="w-screen h-screen flex justify-center items-center">
        <form class="grid grid-cols-3 grid-rows-4 gap-1" wire:submit="save">
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">1</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">2</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">3</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">4</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">5</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">6</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">7</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">8</div>
            <div class="col-span-1 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">9</div>
            <div class="col-span-3 p-5 bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center">0</div>

            <input type="number" wire:model="numero">

            <button class="border rounded-xs bg-blue-400 w-full col-span-3 py-1 font-semibold text-slate-100">Siguiente</button>
        </form>
    </div>
</div>
