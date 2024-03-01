<x-layout>

    <div class="h-screen flex flex-col justify-center items-center mx-auto bg-gradient-to-b from-sky-200 via-transparent to-white">

        @if (session('error'))
        <div role="alert" class="w-[40rem] mb-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-slate-700 opacity-75">
            <p class="font-bold">
                Error: usuario o contraseña incorrectos.
            </p>
            <p>{{ session('error') }}</p>
        </div>
        @endif
        
        <form action="{{route('auth.store')}}" method="POST" class="flex flex-col gap-1 items-center justify-center bg-indigo-100 p-5 shadow-md rounded-sm w-[32rem]">
            @csrf
            
            <h3 class="font-bold text-slate-400 text-lg">LOGIN</h3>
            <h4 class="font-medium text-slate-400 text-md">Sistema llamador de numeros</h4>
            <label for="name" class="w-full text-slate-600">Usuario
                <input name="name" type="text" class="bg-slate-50 w-full rounded-sm" >
            </label>
            <label for="password" class="w-full text-slate-600">Contraseña
                <input name="password" type="password" class="bg-slate-50 w-full rounded-sm" >
            </label>
            
            <div class="flex w-full justify-between items-end">

            <div class="w-full flex flex-col justify-center items-end space-y-1 pt-3">
                <button class="bg-blue-600 text-slate-100 px-3 py-1 shadow-sm rounded-sm hover:bg-blue-400">Ingresar</button>
                <a href="#" class="text-sky-800 font-thin text-sm hover:underline">Olvido su contraseña?</a>
            </div>
            
            </div>
        </form>
        

    </div>

</x-layout>
