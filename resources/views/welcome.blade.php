<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <title>Call System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased w-screen h-screen">

        <nav class="flex">
            <div class="w-full fixed top-0">
                <nav class="bg-slate-100 h-14">
                    <ul class="flex justify-end space-x-5 pr-5 text-sm h-full items-center text-slate-600 shadow-md w-full whitespace-nowrap">
                        <div class="w-full self-start pl-5 py-3 font-bold text-xl text-slate-700">Dashboard</div>
                        <li>Agente: ---</li>
                        <li>Rol: ----
                            <select name="" id=""></select> {{-- a modo de demostracion --}}
                        </li>
                        <li>Salir</li>
                    </ul>
                </nav>
            </div>
            <div class="w-[10rem] h-screen flex flex-col items-center bg-slate-700 z-50 shadow-slate-900 fixed top-14">
                <div class="w-24">
                    <ul class="space-y-4 mt-4 text-slate-100 whitespace-nowrap">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Opcion</a></li>
                        <li><a href="#">Opcion</a></li>
                        <li><a href="#">Opcion</a></li>
                        <li><div class="h-0.5 w-full bg-slate-200"></div></li>
                        <li><a href="#">Opcion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pl-40 pt-14">
            <div class="w-[calc(100vw-10rem)]">

                {{-- _______________________________________________________________________________GRID --}}
                <div class="w-full grid grid-cols-7 grid-rows-3 pt-2 h-[calc(100vh-3.5rem)] gap-1 px-2">

                    {{-- _______________________________________________________________________________table numeros --}}
                    <div class="bg-slate-100 col-span-4 row-span-3 border rounded m-1 p-1 overflow-y-auto overflow-x-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                              <tr>
                                <th scope="col" class="px-1 py-4">Accion</th>
                                <th scope="col" class="px-1 py-4">Nro.</th>
                                <th scope="col" class="px-1 py-4">Fila</th>
                                <th scope="col" class="px-1 py-4">T. de espera</th>
                                <th scope="col" class="px-1 py-4">Estado</th>
                                <th scope="col" class="px-1 py-4">Nombre</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">001</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Terminado</td>
                                <td class="whitespace-nowrap px-1 py-1">Dora Recoba</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">002</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">En ventanilla</td>
                                <td class="whitespace-nowrap px-1 py-1">Daniel Cassim</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">003</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">En preparacion</td>
                                <td class="whitespace-nowrap px-1 py-1">Dario Ortega</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">004</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">En preparacion</td>
                                <td class="whitespace-nowrap px-1 py-1">Don vito</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">005</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Esperando pago</td>
                                <td class="whitespace-nowrap px-1 py-1">Mercedes Sosa</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">006</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Patricia Orrego</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">007</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entregar</td>
                                <td class="whitespace-nowrap px-1 py-1">Estela Urzuaga</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">008</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">En entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Daniel Ledesma</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-1 py-1 font-medium">Llamar</td>
                                <td class="whitespace-nowrap px-1 py-1">009</td>
                                <td class="whitespace-nowrap px-1 py-1">Comun</td>
                                <td class="whitespace-nowrap px-1 py-1">10:20</td>
                                <td class="whitespace-nowrap px-1 py-1">Para entrega</td>
                                <td class="whitespace-nowrap px-1 py-1">Marcos Alberca</td>
                              </tr>

                            </tbody>
                          </table>
                    </div>
                    {{-- _________________________________________________________________________end table numeros --}}

                    {{-- _______________________________________________________________________________numero activo visor --}}
                    <div class="bg-slate-100 col-span-3 row-span-1 border rounded m-1 p-3 text-slate-700">
                        <div class="flex flex-col">
                            <div class="flex 2xl:flex-col justify-between items-center">
                                <div class="2xl:place-self-start">
                                    <p>Fila: Comun</p>
                                    <p>Nombre: Franchesco Coppola</p>
                                    <p>CI: 12553221</p>
                                </div>
                                <div class="bg-slate-500 h-20 flex justify-center items-center my-5 px-14 2xl:px-28 2xl:w-full rounded shadow-sm">
                                    <h2 class="text-5xl text-slate-100 font-bold">002</h2>
                                </div>
                            </div>
                            <div class="flex justify-between 2xl:px-16 whitespace-nowrap">
                                <a class="border border-slate-200 rounded px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-blue-400 hover:text-slate-700 shadow-sm" href="#">A preparacion</a>
                                <a class="border border-slate-200 rounded px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-blue-400 hover:text-slate-700 shadow-sm" href="#">Derivar a</a>
                                <a class="border border-slate-200 rounded px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-red-500 shadow-sm" href="#">Cancelar</a>
                                <a class="border border-slate-200 rounded px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-orange-400 hover:text-slate-700 shadow-sm" href="#">Pausar</a>
                            </div>
                        </div>
                    </div>
                    {{-- _________________________________________________________________________end numero activo visor --}}

                    {{-- _______________________________________________________________________________visor agentes --}}
                    <div class="bg-slate-100 col-span-3 row-span-2 border rounded m-1 p-5 text-slate-700 overflow-y-auto overflow-x-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500 whitespace-nowrap">
                              <tr>
                                <th scope="col" class="px-2 py-4">Accion</th>
                                <th scope="col" class="px-2 py-4">Agente</th>
                                <th scope="col" class="px-2 py-4">Rol</th>
                                <th scope="col" class="px-2 py-4">Fila activa</th>
                                <th scope="col" class="px-2 py-4">Numero activo</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-1">Pedir numero</td>
                                <td class="whitespace-nowrap px-2 py-1 font-medium">Marcos Alberta</td>
                                <td class="whitespace-nowrap px-2 py-1">Entrega</td>
                                <td class="whitespace-nowrap px-2 py-1">Comun</td>
                                <td class="whitespace-nowrap px-2 py-1">004</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-1">Pedir numero</td>
                                <td class="whitespace-nowrap px-2 py-1 font-medium">Marcos Alberta</td>
                                <td class="whitespace-nowrap px-2 py-1">Entrega</td>
                                <td class="whitespace-nowrap px-2 py-1">Comun</td>
                                <td class="whitespace-nowrap px-2 py-1">004</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-1">Pedir numero</td>
                                <td class="whitespace-nowrap px-2 py-1 font-medium">Marcos Alberta</td>
                                <td class="whitespace-nowrap px-2 py-1">Entrega</td>
                                <td class="whitespace-nowrap px-2 py-1">Comun</td>
                                <td class="whitespace-nowrap px-2 py-1">004</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-1">Pedir numero</td>
                                <td class="whitespace-nowrap px-2 py-1 font-medium">Marcos Alberta</td>
                                <td class="whitespace-nowrap px-2 py-1">Entrega</td>
                                <td class="whitespace-nowrap px-2 py-1">Comun</td>
                                <td class="whitespace-nowrap px-2 py-1">004</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-1">Pedir numero</td>
                                <td class="whitespace-nowrap px-2 py-1 font-medium">Marcos Alberta</td>
                                <td class="whitespace-nowrap px-2 py-1">Entrega</td>
                                <td class="whitespace-nowrap px-2 py-1">Comun</td>
                                <td class="whitespace-nowrap px-2 py-1">004</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-1">Pedir numero</td>
                                <td class="whitespace-nowrap px-2 py-1 font-medium">Marcos Alberta</td>
                                <td class="whitespace-nowrap px-2 py-1">Entrega</td>
                                <td class="whitespace-nowrap px-2 py-1">Comun</td>
                                <td class="whitespace-nowrap px-2 py-1">004</td>
                              </tr>
                              <tr class="border-b dark:border-neutral-500">
                                <td class="whitespace-nowrap px-2 py-1">Pedir numero</td>
                                <td class="whitespace-nowrap px-2 py-1 font-medium">Marcos Alberta</td>
                                <td class="whitespace-nowrap px-2 py-1">Entrega</td>
                                <td class="whitespace-nowrap px-2 py-1">Comun</td>
                                <td class="whitespace-nowrap px-2 py-1">004</td>
                              </tr>

                            </tbody>
                          </table>
                    </div>
                    {{-- _________________________________________________________________________end visor agentes --}}

                </div>
                {{-- _________________________________________________________________________END GRID --}}

            </div>
        </main>

        <footer class="z-50 w-24 absolute bottom-1 left-0.5 whitespace-nowrap text-xs text-slate-200">
            <div>
                <p>Fabricio Rivera &copy; 2024</p>
            </div>
        </footer>

    </body>
</html>
