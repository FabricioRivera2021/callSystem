<?php

namespace App\Livewire;

use App\Models\Numeros;
use Livewire\Component;

class NumerosVista extends Component
{

    public function render()
    {
        return view('livewire.numeros-vista', [
            'numeros' => Numeros::with(['customers', 'filas', 'estados'])->get(),
        ]);
    }
}
