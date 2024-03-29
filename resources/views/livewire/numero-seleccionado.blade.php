<div class="flex 2xl:flex-col 2xl:space-y-2 justify-around items-center w-full h-full">
    <div class="bg-orange-400 h-28 flex flex-col justify-center items-center px-14 2xl:px-28 2xl:w-full rounded shadow-sm">
      <h2 class="text-4xl text-slate-700 font-bold">{{(session('numero')) ? session('numero')[0]->numero : '...'}}</h2>
      <span class="text-xl text-slate-700 font-semibold">{{(session('numero')) ? session('numero')[0]->filas->filas : '...'}}</span>
    </div>
    <div class="flex 2xl:flex-col gap-2 justify-between items-center border rounded border-dotted border-slate-700 pl-2 p-1">
        <div class="text-xs">
          <p>Fila: {{(session('numero')) ? session('numero')[0]->filas->filas : 'Sin datos'}}</p>
          <p>Nombre: {{(session('numero')) ? session('numero')[0]->customers[0]->name : 'Sin datos'}}</p>
          <p>CI: {{(session('numero')) ? session('numero')[0]->customers[0]->ci : 'Sin datos'}}</p>
          <p>Estado: {{(session('numero')) ? session('numero')[0]->estados->estados : 'Sin datos'}}</p>
        </div>
        <div class="gap-1 flex flex-col 2xl:flex-row 2xl:px-16 whitespace-nowrap text-center text-sm">
          {{-- 
            Queda realizar el pasaje de estado con los botones
            --}}
            <a 
              class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-blue-400 hover:text-slate-100 shadow-sm" 
              href="#"
              {{(session('numero') !== null) ? '' : 'disabled'}}
              wire:click="handleSetNextState({{(session('numero')) ? session('numero')[0]->numero : 0}})"
              >
                A... {{(session('numeroToNextState')) ? session('numeroToNextState') : ''}}
            </a>
            
            <select 
              class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-blue-400 hover:text-slate-100 shadow-sm"
              {{(session('numero') !== null) ? '' : 'disabled'}}
              >
              <option value="" selected disabled hidden>Derivar a..</option>
                @foreach ($positions as $key => $position)
                  <option
                      {{($key === 0) ? 'disabled hidden' : '' }}
                      value="{{$position->position}}"
                      wire:click="handleDerivarA( {{ $key }}, {{ (session('numero')) ? session('numero')[0]->numero : 0 }})"
                      >
                      {{$position->position}}
                  </option>
                @endforeach
            </select>
            
            <a 
              class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-red-500 shadow-sm" 
              href="#"
              {{(session('numero') !== null) ? '' : 'disabled'}}
              wire:click="handleCancelarNumero({{(session('numero')) ? session('numero')[0]->numero : 0}})"
              >
                Cancelar
            </a>
            
            <a 
              class="border-slate-200 px-2 py-0.5 bg-blue-500 text-slate-200 hover:bg-yellow-400 hover:text-slate-700 shadow-sm" 
              href="#"
              {{(session('numero') !== null) ? '' : 'disabled'}}
              wire:click="handlePausarNumero({{(session('numero')) ? session('numero')[0]->numero : 0}})"
              >
                Pausar
            </a>
            
            <x-numero-seleccionado-msg />
        </div>
    </div>
  </div>