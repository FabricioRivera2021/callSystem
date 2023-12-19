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
    <div class="h-screen flex justify-center items-center mx-auto">
    
        <form action="{{route('auth.store')}}" method="POST" class="flex flex-col gap-4 items-center justify-center bg-slate-300 p-5 shadow-md rounded-lg w-[40rem]">
            @csrf
    
            <h3 class="font-semibold text-slate-500 text-lg">LOGIN</h3>
            <label for="name" class="w-full text-slate-600">User
                <input name="name" type="text" class="bg-slate-50 w-full rounded-sm" >
            </label>
            <label for="password" class="w-full text-slate-600">Password
                <input name="password" type="password" class="bg-slate-50 w-full rounded-sm" >
            </label>
            <button class="bg-blue-600 text-slate-100 px-3 py-1 self-start shadow-sm rounded-sm mt-5">Login</button>
        </form>
    
        @if (session('error'))
            <div role="alert" 
                class="w-[40rem] mb-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-slate-700 opacity-75">
                <p class="font-bold">
                    Pone bien las credenciales, lptqtpario
                </p>
                <p>{{ session('error') }}</p>
            </div>
        @endif
    
    </div>
</body>
</html>
