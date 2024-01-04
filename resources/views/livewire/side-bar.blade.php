<div class="w-[10rem] pl-2 h-screen flex flex-col items-start bg-slate-700 z-50 shadow-slate-900 fixed top-14">
    <div class="w-full">
        <div class="space-y-4 mt-4 text-slate-100 whitespace-nowrap">
            {{-- <div>
              <ul>
                <li><label>Tipo de fila</label></li>
                <li><span type="radio" wire:model="fila" id="ilterFila" name="ilterFila"> Todos </span></li>
                <li><span type="radio" wire:model="fila" id="ilterFila" name="ilterFila"> Comun </span></li>
                <li><span type="radio" wire:model="fila" id="ilterFila" name="ilterFila"> Emergencia </span></li>
                <li><span type="radio" wire:model="fila" id="ilterFila" name="ilterFila"> FNR </span></li>
                <li><span type="radio" wire:model="fila" id="ilterFila" name="ilterFila"> Prioridad </span></li>
                <br>
                <li><span>Estado</span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> Todos </span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> Sin atender </span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> En preparación </span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> Para pagar </span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> Para entregar </span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> Pausados </span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> Cancelados </span></li>
                <li><span wire:model="estado" id="filterEstado" name="filterEstado"> Finalizados </span></li>
              </ul>
            </div> --}}
            <div class="flex flex-col space-y-4 ml-1 mr-5">
              <h5>Filtrar</h5>
              <button class="rounded bg-slate-100 text-slate-700 hover:bg-orange-400" wire:model="filtro" wire:click="filter(0)">Todos</button>
              <button class="rounded bg-slate-100 text-slate-700 hover:bg-orange-400" wire:model="filtro" wire:click="filter(1)">Ventanilla</button>
              <button class="rounded bg-slate-100 text-slate-700 hover:bg-orange-400" wire:model="filtro" wire:click="filter(3)">Preparación</button>
              <button class="rounded bg-slate-100 text-slate-700 hover:bg-orange-400" wire:model="filtro" wire:click="filter(4)">Cajas</button>
              <button class="rounded bg-slate-100 text-slate-700 hover:bg-orange-400" wire:model="filtro" wire:click="filter(5)">Entrega</button>
              <hr>
              <select class="text-slate-100 px-2 py-1 bg-orange-400" name="" id="">
                @foreach (\App\Models\Filas::all() as $fila)
                    <option value="Hola">{{$fila->filas}}</option>
                @endforeach
              </select>
              <div>
                <div><label for="search">Buscar</label></div>
                <div><input class="w-32 text-slate-700" wire:model.live="handleSearch" type="text"></div>
                <div><span class="text-red-400 text-xs">Error</span></div>
              </div>
            </div>
        </div>
    </div>
</div>