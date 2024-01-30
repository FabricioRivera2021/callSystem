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
        2 => 'Preparacion',
        3 => 'Cajas',
        4 => 'Entrega',
        5 => 'Pausados',
        6 => 'Cancelados',
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

    public function filter($key)
    {
        if($key <= 4){
            $this->filtro = $key;
        }elseif($key == 5){
            $this->filtro = 'paused';
        }elseif($key == 6){
            $this->filtro = 'canceled';
        }

        $this->dispatch('filter', filter: $this->filtro);
    }

    public function render()
    {
        return view('livewire.side-bar', [
            'filtros' => $this->filters
        ]);
    }
}
