<div class="w-full fixed top-0">
    <nav class="bg-slate-100 h-14">
        <ul class="flex justify-end space-x-7 pr-5 text-sm h-full items-center text-slate-600 shadow-md w-full whitespace-nowrap">
            <div class="self-start w-full flex">
                <div class="pl-5 py-3 font-bold text-xl text-slate-700">Panel de agente</div>
                <div class="pl-5 py-3 font-bold text-xl text-slate-700">
                    <select class="text-slate-100 px-2 py-0.5 bg-blue-400 font-normal rounded text-sm" name="" id="">
                        @foreach ($positions as $key => $position)
                            <option 
                                wire:model="position"
                                wire:click="handlePosition({{$key+1}})" 
                                value="{{$position->position}}">
                                {{$position->position}}
                            </option>
                        @endforeach
                      </select>
                      <button class="rounded-md bg-slate-200 text-slate-700 hover:bg-slate-300 px-5 py-0.5 text-sm">Cambiar</button>
                </div>
            </div>
            
            <li class="font-semibold text-xs">Agente -> <span>{{auth()->user()->name}}</span></li>
            {{-- <li class="font-semibold">Rol -> {{auth()->user()->roles->roles}}</li> --}}
            <li class="font-semibold text-xs" wire:model="position">Puesto actual -> {{$currPosition[0]->positions->position}}</li>
            <li>
                <form action="{{route('auth.destroy')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-slate-100 font-semibold text-sm bg-red-400 px-5 shadow-xs">SALIR</button>
                </form>
            </li>
        </ul>
    </nav>
</div>