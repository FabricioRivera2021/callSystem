<x-layout>

    <div class="h-screen flex justify-center items-center mx-auto">
        
        <form action="{{route('auth.store')}}" method="POST" class="flex flex-col gap-4 items-center justify-center bg-slate-300 p-5 shadow-md rounded-sm w-[40rem]">
            @csrf
            
            <h3 class="font-bold text-slate-500 text-lg">LOGIN</h3>
            <label for="name" class="w-full text-slate-600">Usuario
                <input name="name" type="text" class="bg-slate-50 w-full rounded-sm" >
            </label>
            <label for="password" class="w-full text-slate-600">Contraseña
                <input name="password" type="password" class="bg-slate-50 w-full rounded-sm" >
            </label>
            <div class="flex w-full justify-between items-center mt-4">
                <button class="bg-blue-600 text-slate-100 px-3 py-1 self-start shadow-sm rounded-sm hover:bg-blue-400">Ingresar</button>
                <a href="#" class="text-sky-800 font-thin text-sm hover:underline">Recuperar contraseña..</a>
            </div>
        </form>
        
        @if (session('error'))
        <div role="alert" class="w-[40rem] mb-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-slate-700 opacity-75">
            <p class="font-bold">
                Error: usuario o contraseña incorrectos.
            </p>
            <p>{{ session('error') }}</p>
        </div>
        @endif
    </div>

</x-layout>
