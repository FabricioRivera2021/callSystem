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

    public $number = '';

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

        $this->dispatch('clearDisplay');
    }
    
    public function add()
    {
        //se setea la variable customer_id con la cedula que halla ingresado el usuario en el panel
        $this->customers_id = intval($this->displayNumber);

        // limpia el display para ingresar otra cedula
        $this->displayNumber = '';
        $this->dispatch('error');
        
        //validaciones
        $validated = $this->validate([
            'customers_id' => 'exists:customers,ci',
            'estados_id' => 'required'
        ]);

        //! Validar que no se este ingresando una cedula que ya esta dentro del array


        //se inserta al array de customers despues de la validacion de que existen
        array_push($this->manyCustomers, [
            'ci' => $this->customers_id, 'name' => Customers::where('ci', $this->customers_id)->get('name')[0]->name
        ]);
        
        $this->dispatch('numberAdded');
        return $validated;
    }

    public function save()
    {
        //Valido que se halla creado el array de customers en el paso anterior
        if(count($this->manyCustomers) > 0){
            $this->number = Numeros::create([
                'numero' => (Numeros::latest()->first()) ? Numeros::latest()->orderBy('id', 'desc')->first()->numero + 1 : 1,
                'estados_id' => 1
            ]);
        }

        //si el numero se crea, entonces se le asigna el numero al o los customers que halla ingresado su cedula
        if(isset($this->number) && count($this->manyCustomers) == 1){
            //una cedula
            Customers::where('ci', $this->manyCustomers[0]['ci'])->update([
                'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
            ]);
        }elseif(isset($this->number) && count($this->manyCustomers) > 1){
            //multipes cedulas
            foreach($this->manyCustomers as $customer){
                Customers::where('ci', $customer['ci'])->update([
                    'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
                ]);
            }
        }else{
            $this->dispatch('error');
        }
            
            
        $this->dispatch('numberCreated');                    
    }

    public function render()
    {
        return view('livewire.panel-numerico', [
            'cedulas' => $this->manyCustomers
        ]);
    }
}
