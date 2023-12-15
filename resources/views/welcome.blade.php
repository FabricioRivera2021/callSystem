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
    <body class="antialiased w-screen">

        <main class="flex">
            <div class="w-full fixed top-0">
                <nav class="bg-slate-100 h-14">
                    <ul class="flex justify-end space-x-5 pr-5 text-sm h-full items-center text-slate-600 shadow-md w-full whitespace-nowrap">
                        <div class="w-full self-start pl-5 py-3 font-bold text-xl text-slate-700">Dashboard</div>
                        <li>Usuario: ---</li>
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
        </main>

        <footer></footer>

    </body>
</html>
