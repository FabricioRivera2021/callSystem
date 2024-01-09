<?php

namespace App\Livewire;

use App\Models\Customers;
use App\Models\Numeros;
use Livewire\Component;

class PanelNumerico extends Component
{
    public $displayNumber = ''; //el numero que esta en el panel

    public $customers_id = ''; //el valor de la cedula que se ingreso

    public $manyCustomers = []; //si se ingresan varias cedulas se agregan aqui

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
        //limpiar el array del customers
        $this->manyCustomers = [];
        //se limpia el numero que este en el panel
        $this->displayNumber = '';
    }
    
    public function add()
    {
        //se setea la variable customer_id con la cedula que halla ingresado el usuario en el panel
        $this->customers_id = intval($this->displayNumber);

        // limpia el display para ingresar otra cedula
        $this->displayNumber = '';
        // $this->dispatch('error');
        
        //validaciones
        $validated = $this->validate([
            'customers_id' => 'exists:customers,ci',
            'estados_id' => 'required'
        ]);
        //se inserta al array de customers despues de la validacion de que existen
        array_push($this->manyCustomers, [
            'ci' => $this->customers_id, 'name' => Customers::where('ci', $this->customers_id)->get('name')[0]->name
        ]);
        $this->dispatch('numberAdded');

        // //creo el numero
        // $number = Numeros::create([
        //     'numero' => (Numeros::latest()->first()) ? Numeros::latest()->orderBy('id', 'desc')->first()->numero + 1 : 1,
        //     'estados_id' => 1
        // ]);

        // //si el numero se crea, entonces se le asigna el numero al customer que halla ingresado su cedula
        // if(isset($number)){
        //     Customers::where('ci', $validated['customers_id'])->update([
        //         'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
        //     ]);
        // }else{
        //     //sino se envia un error al panel
        //     $this->dispatch('error');
        // }
        

        // $this->dispatch('numberCreated');
    }


    public function render()
    {
        return view('livewire.panel-numerico', [
            'cedulas' => $this->manyCustomers
        ]);
    }
}
