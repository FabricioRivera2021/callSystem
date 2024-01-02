<?php

namespace App\Livewire;

use App\Models\Customers;
use App\Models\Numeros;
use Livewire\Component;

class PanelNumerico extends Component
{
    public $numero = '';

    public $displayNumber = '';

    public $customers_id = '';

    public $estados_id = 1;

    public $filas_id = 2;

    public function appendNumber($number)
    {
        $this->displayNumber .= $number;
    }

    public function deleteNumber()
    {
        $this->displayNumber = substr($this->displayNumber, 0, -1);
    }

    public function clear()
    {
        $this->displayNumber = '';
    }
    
    public function save()
    {
        $this->customers_id = intval($this->displayNumber);

        // Clear the display for a new number
        $this->displayNumber = '';
        $this->dispatch('error');
        
        $validated = $this->validate([
            'customers_id' => 'exists:customers,ci',
            'estados_id' => 'required',
            'filas_id' => 'required'
        ]);

        Numeros::create([
            'numero' => (Numeros::latest()->first()) ? Numeros::latest()->first()->numero + 1 : 1,
            'customers_id' => Customers::where('ci', $validated['customers_id'])->get('id')[0]->id,
            'estados_id' => 1,
            'filas_id' => 1
        ]);

        $this->dispatch('numberCreated');
    }


    public function render()
    {
        return view('livewire.panel-numerico');
    }
}
