<div class="w-full fixed top-0">
    <nav class="bg-slate-100 h-14">
        <ul class="flex justify-end space-x-7 pr-5 text-sm h-full items-center text-slate-600 shadow-md w-full whitespace-nowrap">
            <div class="w-full self-start pl-5 py-3 font-bold text-xl text-slate-700">Panel de agente</div>
            <li>Agente - <span class="font-semibold">{{auth()->user()->name}}</span></li>
            <li>Rol -
                <select name="" id="">
                    @foreach (\App\Models\Roles::all() as $role)
                        <option value="Hola">{{$role->roles}}</option>
                    @endforeach
                </select>
            </li>
            <li>
                <form action="{{route('auth.destroy')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 font-semibold text-sm">Salir</button>
                </form>
            </li>
        </ul>
    </nav>
</div>