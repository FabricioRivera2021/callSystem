<?php

namespace App\Livewire;

use App\Models\Numeros;
use Livewire\Component;

class PanelNumerico extends Component
{
    public $numero = '';

    public $data = '';

    public function save()
    {
        $data = Numeros::create([
            'numero' => 115,
            // hardcodeado
            'customers_id' => $this->numero,
            'estados_id' => 1,
            'filas_id' => 2,
        ]);

        $this->dispatch('numero-creado'); 
    }

    public function render()
    {
        return view('livewire.panel-numerico');
    }
}
