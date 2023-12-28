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
                      <div class="flex 2xl:flex-col 2xl:space-y-2 justify-around items-center w-full h-full">
                        <div class="bg-orange-400 h-28 flex flex-col justify-center items-center px-14 2xl:px-28 2xl:w-full rounded shadow-sm">
                          <h2 class="text-5xl text-slate-700 font-bold">145</h2>
                          <span class="text-xl text-slate-700 font-semibold">Comun</span>
                        </div>
                        <div class="flex 2xl:flex-col gap-2 justify-between items-center border rounded border-dotted border-slate-700 pl-2 p-1">
                            <div class="text-xs">
                              <p>Fila: Comun</p>
                              <p>Nombre: Lorem ipsun</p>
                              <p>CI: 12553221</p>
                            </div>
                            <div class="gap-1 flex flex-col 2xl:flex-row 2xl:px-16 whitespace-nowrap text-center text-sm">
                                <a class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-blue-400 hover:text-slate-100 shadow-sm" href="#">A preparacion</a>
                                <a class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-blue-400 hover:text-slate-100 shadow-sm" href="#">Derivar a</a>
                                <a class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-red-500 shadow-sm" href="#">Cancelar</a>
                                <a class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-yellow-400 hover:text-slate-700 shadow-sm" href="#">Pausar</a>
                            </div>
                        </div>
                      </div>
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
