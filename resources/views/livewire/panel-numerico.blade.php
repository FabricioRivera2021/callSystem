<div>
    <div class="w-screen h-screen flex flex-col justify-center items-center" x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">

        <h1 class="text-xl uppercase font-semibold text-slate-500 mb-1">Ingrese su documento</h1>
        <h2 class="text-sm font-semibold text-slate-500 mb-10">Sin puntos ni guiones</h2>

        <div class="w-3/5 max-w-sm grid grid-cols-3 grid-rows-4 gap-1">
            @for ($i = 1; $i < 10; $i++)
                <div wire:click="appendNumber({{$i}})" class="col-span-1 p-5 text-4xl text-center bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300">{{$i}}</div>
            @endfor
            <div wire:click="appendNumber(0)" class="col-span-2 p-5 text-4xl bg-slate-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center">0</div> 
            <div wire:click="deleteNumber" class="col-span-1 p-5 text-4xl bg-orange-300 border font-semibold text-slate-500 hover:bg-blue-300 text-center"><</div>
        </div>

        <input class="my-5 px-5 py-2 border rounded-sm" type="text" wire:model="displayNumber" readonly>

        <div> 
            <div
                class="modal"
                role="dialog"
                tabindex="-1"
                x-show="isModalOpen"
                x-on:click.away="isModalOpen = false"
                x-cloak
                x-transition
                >
                <div>
                    <div>
                        <h3>Hello World</h3>
                        <button aria-label="Close" x-on:click="isModalOpen=false">✖</button>
                    </div>
                    <div>Quiere ingresar otra cedula?</div>
                </div>
            </div>
        </div>
        
        @error('customers_id')
            <div class="fixed inset-x-0 bottom-10 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-50">
                <div    
                    x-data="{ show: false, timeout: null }"
                    x-init="@this.on('error', () => {
                        clearTimeout(timeout);
                        show = true;
                        timeout = setTimeout(() => show = false, 5000);
                    })"
                    x-show="show" 
                    x-description="Notification panel, show/hide based on alert state." 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="max-w-xs w-full bg-white shadow-lg rounded-lg pointer-events-auto"
                >
                    <div class="rounded-lg shadow-xs overflow-hidden bg-red-500">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="font-semibold leading-5 text-gray-100">
                                        No se encontro el documento
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="fixed inset-x-0 bottom-10 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-50">
                <div 
                    x-data="{ show: false, timeout: null, numberOK: false }"
                    x-init="@this.on('numberCreated', () => {
                        clearTimeout(timeout);
                        show = true;
                        timeout = setTimeout(() => show = false, 3000);
                        numberOK = true;
                    })"
                    x-show="show" 
                    x-description="Notification panel, show/hide based on alert state." 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="max-w-xs w-full bg-white shadow-lg rounded-lg pointer-events-auto"
                >
                    <div class="rounded-lg shadow-xs overflow-hidden bg-green-500">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="font-semibold text-center leading-5 text-gray-100">
                                        Imprimiendo numero
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @enderror
        
        <div>
            <button wire:click="clear" class="border rounded-xs bg-blue-400 px-3 col-span-3 py-1 font-semibold text-slate-100">Cancelar</button>
            <button wire:click="save" x-on:click="isModalOpen = true"  class="border rounded-xs bg-blue-400 px-3 col-span-3 py-1 font-semibold text-slate-100">Siguiente</button>
        </div>
        
    </div>
</div>
