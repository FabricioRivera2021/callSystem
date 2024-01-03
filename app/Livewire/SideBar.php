<?php

namespace App\Livewire;

use Livewire\Component;

class SideBar extends Component
{
    public $filtro = '';

    public function filter($estado)
    {
        $this->filtro = $estado;

        $this->dispatch('filter', filter: $this->filtro);
    }

    public function render()
    {
        return view('livewire.side-bar');
    }
}
