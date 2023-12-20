<div class="w-[10rem] pl-2 h-screen flex flex-col items-start bg-slate-700 z-50 shadow-slate-900 fixed top-14">
    <div class="w-24">
        <ul class="space-y-4 mt-4 text-slate-100 whitespace-nowrap">
            <li>
              <span class="font-semibold">Filtrar numeros</span>
              <ul class="pl-2">
                <li><label for="search">Buscar</label></li>
                <li><input class="w-32 text-slate-700" name="search" type="text"></li>
                <br>
                <li><label for="filterFila">Tipo de fila</label></li>
                <li><input type="radio" id="ilterFila" name="ilterFila"> Todos</li>
                <li><input type="radio" id="ilterFila" name="ilterFila"> Comun</li>
                <li><input type="radio" id="ilterFila" name="ilterFila"> Emergencia</li>
                <li><input type="radio" id="ilterFila" name="ilterFila"> FNR</li>
                <li><input type="radio" id="ilterFila" name="ilterFila"> Prioridad</li>
                <br>
                <li><label for="filterEstado">Estado</label></li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> Todos</li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> Sin atender</li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> En preparación</li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> Para pagar</li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> Para entregar</li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> Pausados</li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> Cancelados</li>
                <li><input type="radio" id="filterEstado" name="filterEstado"> Finalizados</li>
              </ul>
            </li>
        </ul>
    </div>
</div>