<?php

namespace App\Livewire;

use App\Models\Customers;
use App\Models\Numeros;
use Livewire\Component;

class PanelNumerico extends Component
{
    public $numero = '';

    public function save()
    {
        Numeros::create([
            'numero' => $this->numero,
            // hardcodeado
            'estados_id' => 1,
            'filas_id' => 2,
        ]);

        Customers::create([
            'numeros_id' => 90,
            'name' => 'testing',
            'ci' => 1234565
        ]);
    }

    public function render()
    {
        return view('livewire.panel-numerico');
    }
}
