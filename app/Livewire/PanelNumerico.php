<?php

namespace App\Livewire;

use App\Models\Numeros;
use Livewire\Component;

class PanelNumerico extends Component
{
    public $numero = '';

    public $displayNumber = '';

    public function appendNumber($number)
    {
        $this->displayNumber .= $number;
    }

    public function save()
    {
        Numeros::create([
            'numero' => 1,
            // hardcodeado
            'customers_id' => intval($this->displayNumber),
            'estados_id' => 1,
            'filas_id' => 2,
        ]);

        // Clear the display for a new number
        $this->displayNumber = '';
    }

    public function render()
    {
        return view('livewire.panel-numerico');
    }
}
