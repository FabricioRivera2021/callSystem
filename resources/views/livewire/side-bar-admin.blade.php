<div class="w-[10rem] pl-2 h-screen flex flex-col items-start bg-slate-700 z-50 shadow-slate-900 fixed top-14">
    <div class="w-full">
        <div class="space-y-4 mt-4 text-slate-100 whitespace-nowrap">
            <div class="flex flex-col space-y-4 ml-1 mr-5" x-data="{ activeFilter: null }">
              <h5>Filtrar</h5>
              <hr>
              <select class="text-slate-100 px-2 py-1 bg-orange-400 rounded-sm" name="" id="">
                
              </select>
              <div>
                <div><label for="search">Buscar</label></div>
                <div><input class="w-32 text-slate-700" wire:model.live="search" wire:keydown="handleSearch" type="text"></div>
              </div>
            </div>
        </div>
    </div>
</div>
