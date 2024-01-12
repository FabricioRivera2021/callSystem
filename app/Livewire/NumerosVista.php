<?php

namespace App\Livewire;

use App\Models\Numeros;
use Livewire\Component;
use Livewire\Attributes\On;

class NumerosVista extends Component
{
    public $estado_id = '';

    public $fila_id = '';

    public $query = '';

    public $searchBox = '';

    //llamoda al numero que este sin atender
    public function callNumber($number)
    {
        //si el rol actual es ventanilla lo deja llamar
        if(auth()->user()->roles->roles === 'admin'){
            $this->dispatch('currentNumber', numero: $number);
        }
    }
    
    #[On('filter')]
    public function filter($filter)
    {
        return $this->estado_id = $filter;
    }
    
    #[On('filterByFila')]
    public function filterByFila($fila)
    {
        return $this->fila_id = $fila;
    }

    #[On('search')]
    public function search($searchParameter)
    {
        $this->searchBox = $searchParameter;
    }

    public function render()
    {
        $filter = $this->estado_id;

        $search = $this->searchBox;

        $fila = $this->fila_id;

        return view('livewire.numeros-vista', [
            'numeros' => Numeros::when($filter ?? null, function($query) use ($filter){
                                            $query->where('estados_id', $filter);
                                        })
                                ->when($fila ?? null, function($query) use ($fila){
                                        $query->where('filas_id', 'LIKE', "%" . $fila . "%");
                                        })
                                ->when($search ?? null, function($query) use ($search){
                                        $query->where('numero', 'LIKE', "%" . $search . "%")
                                            ->orWhereHas('customers', function( $query ) use ( $search ){
                                                $query->where('name', 'LIKE', "%" . $search . "%");
                                            });
                                })
                                ->get()
        ]);
    }
}



// return view('livewire.numeros-vista', [
//     'numeros' => Numeros::when($filter ?? null, function($query) use ($filter){
//                         $query->where('estados_id', $filter);
//                     })->when($search ?? null, function($query) use ($search){
//                         $query->where('numero', 'LIKE', "%" . $search . "%");
//                         })->get()
// ]);