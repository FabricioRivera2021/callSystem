<?php

namespace App\Livewire;

use App\Models\Numeros;
use Livewire\Component;
use Livewire\Attributes\On;

class NumerosVista extends Component
{
    public $estado_id = '';

    public $query = '';

    public $searchBox = '';

    #[On('search')]
    public function search($searchParameter)
    {
        $this->searchBox = $searchParameter;
    }

    #[On('filter')]
    public function filter($filter)
    {
        return $this->estado_id = $filter;
    }

    public function render()
    {
        $filter = $this->estado_id;

        $search = $this->searchBox;

        return view('livewire.numeros-vista', [
            'numeros' => Numeros::with(['customers', 'filas', 'estados'])
                ->when($filter ?? null, function($query) use ($filter){
                        $query->where('estados_id', $filter);
                    })->when($search ?? null, function($query) use ($search){
                        $query->where('numero', 'LIKE', "%" . $search . "%");
                        })
                            ->get()
        ]);
    }
}
