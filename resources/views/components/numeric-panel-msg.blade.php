    {{-- Error message --}}
    <div class="fixed inset-x-0 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 z-50">
        <div    
            x-data="{ show: false, timeout: null }"
            x-init="@this.on('error', () => {
                clearTimeout(timeout);
                show = true;
                timeout = setTimeout(() => show = false, 3000);
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
    
    {{-- Info message for adding number --}}
    <div class="fixed inset-x-0 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 z-50">
        <div 
            x-data="{ show: false, timeout: null, numberOK: false }"
            x-init="@this.on('numberAdded', () => {
                clearTimeout(timeout);
                show = true;
                timeout = setTimeout(() => show = false, 4000);
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
            <div class="rounded-lg shadow-xs overflow-hidden bg-blue-500">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="font-semibold text-center leading-5 text-gray-100">
                                CI agregada
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Info message for creating number --}}
    <div class="fixed inset-x-0 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 z-50">
        <div 
            x-data="{ show: false, timeout: null, numberOK: false }"
            x-init="@this.on('numberCreated', () => {
                clearTimeout(timeout);
                show = true;
                timeout = setTimeout(() => show = false, 4000);
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

    {{-- Info message for number already taken by another ci --}}
    <div class="fixed inset-x-0 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 z-50">
        <div 
            x-data="{ show: false, timeout: null, numberOK: false }"
            x-init="@this.on('errorNumberAlreadyTaken', () => {
                clearTimeout(timeout);
                show = true;
                timeout = setTimeout(() => show = false, 4000);
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
            <div class="rounded-lg shadow-xs overflow-hidden bg-red-500">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="font-semibold text-center leading-5 text-gray-100">
                                La cedula ingresada ya tiene otro numero asignado
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Info message for repeated number --}}
    <div class="fixed inset-x-0 flex items-center justify-center px-4 py-6 pointer-events-none sm:p-6 z-50">
        <div 
            x-data="{ show: false, timeout: null, numberOK: false }"
            x-init="@this.on('ci_repetida', () => {
                clearTimeout(timeout);
                show = true;
                timeout = setTimeout(() => show = false, 4000);
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
            <div class="rounded-lg shadow-xs overflow-hidden bg-red-500">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="font-semibold text-center leading-5 text-gray-100">
                                Cedula repetida
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>