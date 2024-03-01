<div class="w-full fixed top-0">
    <nav class="bg-slate-100 h-14">
        <ul class="flex justify-end space-x-7 pr-5 text-sm h-full items-center text-slate-600 shadow-md w-full whitespace-nowrap">
            <div class="self-start w-full flex">
                <div class="pl-5 py-3 font-bold text-xl text-slate-700">Administrador</div>
                <div class="pl-5 py-3 font-bold text-xl text-slate-700"></div>
            </div>
            
            <li>
                <form action="{{route('auth.destroy')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-slate-100 font-bold text-sm bg-red-400 rounded-md px-5 shadow-xs hover:bg-red-500">SALIR</button>
                </form>
            </li>
        </ul>
    </nav>
</div>
