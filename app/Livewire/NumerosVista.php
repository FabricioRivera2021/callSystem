<?php

namespace App\Livewire;

use App\Models\Numeros;
use Livewire\Component;
use Livewire\Attributes\On;

class NumerosVista extends Component
{
    public $updatedData;

    #[On('numero-creado')]
    public function refresh()
    {
        $this->refresh;
    }

    public function render()
    {
        return view('livewire.numeros-vista', [
            'numeros' => Numeros::with(['customers', 'filas', 'estados'])->get(),
        ]);
    }
}
