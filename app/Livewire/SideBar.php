<?php

namespace App\Livewire;

use Livewire\Component;

class SideBar extends Component
{
    public $filtro = '';

    public $fila = '';

    public $search = '';

    public $filters = [
        0 => 'Todos',
        1 => 'Ventanilla',
        3 => 'Preparacion',
        4 => 'Cajas',
        5 => 'Entrega',
        6 => 'Pausados',
        7 => 'Cancelados',
    ];

    public $filas = [
        0 => 'Todos',
        1 => 'Comun',
        2 => 'Emergencia',
        3 => 'FNR',
        4 => 'Prioridad'
    ];

    public function handleFila($fila)
    {
        $this->fila = $fila;

        $this->dispatch('filterByFila', fila: $this->fila);
    }

    public function handleSearch()
    {
        $this->dispatch('search', searchParameter: $this->search);
    }

    public function filter($estado)
    {
        $this->filtro = $estado;

        $this->dispatch('filter', filter: $this->filtro);
    }

    public function render()
    {
        return view('livewire.side-bar', [
            'filtros' => $this->filters
        ]);
    }
}
