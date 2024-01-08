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
        //se van añadiendo los numeros a medida que el usuario usa el panel
        $this->displayNumber .= $number;
    }

    public function deleteNumber()
    {
        //se van eliminando numeros a medida que se presiona el boton de borrar
        $this->displayNumber = substr($this->displayNumber, 0, -1);
    }

    public function clear()
    {
        //se limpia el numero que este en el panel
        $this->displayNumber = '';
    }
    
    public function save()
    {
        //se setea la variable customer_id con la cedula que halla ingresado el usuario en el panel
        $this->customers_id = intval($this->displayNumber);

        // Clear the display for a new number
        $this->displayNumber = '';
        $this->dispatch('error');
        
        $validated = $this->validate([
            'customers_id' => 'exists:customers,ci', //valido que exista la cedula
            'estados_id' => 'required',
            'filas_id' => 'required'
        ]);

        $number = Numeros::create([
            'numero' => (Numeros::latest()->first()) ? Numeros::latest()->orderBy('id', 'desc')->first()->numero + 1 : 1,
            'estados_id' => 1,
            'filas_id' => 1
        ]);

        //si el numero se crea, entonces se le asigna el numero al customer que halla ingresado su cedula
        if(isset($number)){
            Customers::where('ci', $validated['customers_id'])->update([
                'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
            ]);
        }else{
            //sino se envia un error al panel
            $this->dispatch('error');
        }
        

        $this->dispatch('numberCreated');
    }


    public function render()
    {
        return view('livewire.panel-numerico');
    }
}
