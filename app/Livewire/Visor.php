<?php

namespace App\Livewire;

use App\Models\Numeros;
use App\Models\User;
use Livewire\Component;

class Visor extends Component
{
    public $numero = '';
    
    public function render()
    {
        return view('livewire.visor', [
            // 'numeros' => Numeros::whereNotNull('user_id')->get(),
            'userNumerosVentanilla' => User::has('numeros')
                ->whereHas('numeros', function ($query) {
                    $query->where('estados_id', 1);
                })
                ->with(['numeros' => function ($query) {
                    $query->where('estados_id', 1);
                }])
                ->get(),

            'userNumerosCaja' => User::has('numeros')
                ->whereHas('numeros', function ($query) {
                    $query->where('estados_id', 3);
                })
                ->with(['numeros' => function ($query) {
                    $query->where('estados_id', 3);
                }])
                ->get(),

            'userNumerosEntrega' => User::has('numeros')
                ->whereHas('numeros', function ($query) {
                    $query->where('estados_id', 4);
                })
                ->with(['numeros' => function ($query) {
                    $query->where('estados_id', 4);
                }])
                ->get(), 
        ]);
    }
}
