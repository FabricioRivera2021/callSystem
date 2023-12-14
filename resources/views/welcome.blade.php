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
    <body class="antialiased">
        
        <nav class="w-screen h-10 bg-zinc-200 flex justify-between items-center">
            <div>
                <h3 class="ml-4 text-2xl font-bold text-slate-600">TITULO</h3>
            </div>
            <div>
                <ul class="flex space-x-4 mr-5 text-sm">
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Logout</a></li>
                    <li><a href="#">Reset password</a></li>
                </ul>
            </div>
        </nav>

        <main>
            <div class="w-[10rem] h-screen flex flex-col items-center bg-slate-400 fixed">
                <div class="bg-slate-200 mt-16 self-start pl-5 pr-2 font-semibold">Dashboard</div>
                <div class="w-24">
                    <ul class="space-y-4 mt-4 text-slate-100">
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
