<div wire:poll>
    <div class="grid grid-cols-3">
        {{-- ! limitar la cantidad de caracteres del nombre para que no se salga del card
            ! se rompio la funcion de enviar a otra ventanilla FIX THAT! --}}

        <div class="bg-slate-200 h-screen col-span-1">
            <h2 class="bg-slate-100 py-2 mt-3 mx-4 rounded-lg text-center font-semibold text-2xl text-slate-600 mb-5">Ventanilla</h2>
            @foreach ($userNumerosVentanilla as $usuario)
            {{-- <p>{{$usuario->numeros->numero}}</p> --}}
            <div class="px-5 pt-3 border rounded-lg mx-4 bg-slate-100 mb-2"> 
                <h3 class="text-4xl text-left text-slate-600 font-bold uppercase">{{$usuario->positions->position}}</h3>
                <div class="flex flex-row justify-start gap-4 items-center text-slate-600">
                    <div class="text-2xl font-semibold">
                        <p>{{$usuario->numeros->customers[0]->name}}</p>
                        <p>Fila: {{$usuario->numeros->filas->filas}}</p>
                    </div>
                    <p class="text-7xl font-bold text-orange-400">{{$usuario->numeros->numero}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-slate-200 h-screen col-span-1">
            <h2 class="bg-slate-100 py-2 mt-3 mx-4 rounded-lg text-center font-semibold text-2xl text-slate-600 mb-5">Ventanilla</h2>
            @foreach ($userNumerosCaja as $usuario)
            {{-- <p>{{$usuario->numeros->numero}}</p> --}}
            <div class="px-5 pt-3 border rounded-lg mx-4 bg-slate-100 mb-2"> 
                <h3 class="text-4xl text-left text-slate-600 font-bold uppercase">{{$usuario->positions->position}}</h3>
                <div class="flex flex-row justify-start gap-4 items-center text-slate-600">
                    <div class="text-2xl font-semibold">
                        <p>{{$usuario->numeros->customers[0]->name}}</p>
                        <p>Fila: {{$usuario->numeros->filas->filas}}</p>
                    </div>
                    <p class="text-7xl font-bold text-orange-400">{{$usuario->numeros->numero}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-slate-200 h-screen col-span-1">
            <h2 class="bg-slate-100 py-2 mt-3 mx-4 rounded-lg text-center font-semibold text-2xl text-slate-600 mb-5">Ventanilla</h2>
            @foreach ($userNumerosEntrega as $usuario)
            {{-- <p>{{$usuario->numeros->numero}}</p> --}}
            <div class="px-5 pt-3 border rounded-lg mx-4 bg-slate-100 mb-2"> 
                <h3 class="text-4xl text-left text-slate-600 font-bold uppercase">{{$usuario->positions->position}}</h3>
                <div class="flex flex-row justify-start gap-4 items-center text-slate-600">
                    <div class="text-2xl font-semibold">
                        <p>{{$usuario->numeros->customers[0]->name}}</p>
                        <p>Fila: {{$usuario->numeros->filas->filas}}</p>
                    </div>
                    <p class="text-7xl font-bold text-orange-400">{{$usuario->numeros->numero}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
