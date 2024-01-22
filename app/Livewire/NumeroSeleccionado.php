<?php

namespace App\Livewire;

use App\Models\Numeros;
use Livewire\Attributes\On;
use Livewire\Component;

class NumeroSeleccionado extends Component
{
    //current number
    public $number = '';

    //was the number already taken??
    public $numberAlreadyTaken = '';

    //deberia setearse desde el boton de llamar numero, no desde aqui

    //numero activo en el usuario que este logueado ahora
        //auth()->user()
        
        //como se que numero esta activo?
        //auth()->user()->id === numero->user_id

    //enviar los numeros hacia diferentes partes del proceso
    //cambiarlos de estado [sin atender, en preparacion, pausado, cancelado, etc]

    //poder cambiarlos de filas

    //guardar el tiempo de espera
    //guardar las acciones del usuario que este trabajando

    #[On('numberAlreadyTaken')]
    public function numberAlreadyTaken()
    {
        return $this->numberAlreadyTaken = true;
    }

    #[On('currentNumber')]
    public function filter($numero)
    {
        return $this->number = Numeros::where('numero', $numero)->get();
    }

    public function render()
    {
        return view('livewire.numero-seleccionado',[
            'numero' => ($this->number) ? $this->number : ''
        ]);
    }
}
