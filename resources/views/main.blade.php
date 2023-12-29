<x-layout>

        <nav class="flex">
            <x-nav-bar />
            <x-side-bar />
        </nav>

        <main class="pl-40">
            <div class="w-[calc(100vw-10rem)]">

                {{-- _______________________________________________________________________________GRID --}}
                <div class="w-full grid grid-cols-7 grid-rows-3 pt-10 h-[calc(100vh-3.5rem)] gap-1 px-2 mt-6  overflow-x-hidden">

                    {{-- _______________________________________________________________________________table numeros --}}
                    <div class="bg-slate-100 col-span-4 row-span-3 border rounded m-1 p-1 overflow-y-auto">
                      @livewire('numeros-vista')
                    </div>
                    {{-- _________________________________________________________________________end table numeros --}}

                    {{-- _______________________________________________________________________________numero activo visor --}}
                    <div class="bg-slate-100 col-span-3 row-span-1 border rounded m-1 p-3 text-slate-700 h-full">
                      @livewire('numero-seleccionado')
                    </div>
                    {{-- _________________________________________________________________________end numero activo visor --}}

                    {{-- _______________________________________________________________________________visor agentes --}}
                    <div class="bg-slate-100 col-span-3 row-span-2 border rounded m-1 p-5 text-slate-700 overflow-y-auto overflow-x-hidden">
                      @livewire('agentes-vista')
                    </div>
                    {{-- _________________________________________________________________________end visor agentes --}}

                </div>
                {{-- _________________________________________________________________________END GRID --}}

            </div>
        </main>

        <footer class="z-50 w-24 absolute bottom-2 left-2 whitespace-nowrap text-xs text-slate-200">
            <div>
                <p>Fabricio Rivera &copy; 2024</p>
            </div>
        </footer>

</x-layout>
