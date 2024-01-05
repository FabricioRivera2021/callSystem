<?php

namespace App\Livewire;

use Livewire\Component;

class SideBar extends Component
{
    public $filtro = '';

    public $search = '';

    public $filters = [
        0 => 'Todos',
        1 => 'Ventanilla',
        2 => 'Preparacion',
        3 => 'Cajas',
        4 => 'Entrega',
    ];

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
