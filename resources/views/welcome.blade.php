<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        
        <nav class="w-screen h-10 bg-slate-400 flex justify-between items-center">
            <div>
                <h3 class="ml-5">Titulo</h3>
            </div>
            <div>
                <ul class="flex space-x-4 mr-5">
                    <li>Login</li>
                    <li>Logout</li>
                    <li>Reset password</li>
                </ul>
            </div>
        </nav>

        <main>
            <div class="w-[10rem] h-screen flex flex-col items-center bg-slate-400 fixed">
                <div class="bg-orange-400 mt-5 self-start pl-5 pr-2">Dashboard</div>
                <div>
                    <ul>
                        <li>Perfil</li>
                        <li>Opcion 1</li>
                        <li>Opcion 2</li>
                        <li>Opcion 3</li>
                    </ul>
                </div>
            </div>
        </main>

        <footer></footer>

    </body>
</html>
