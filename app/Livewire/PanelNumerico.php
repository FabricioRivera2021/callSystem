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

    public $repeatedNumber = false;//valida si se esta repitiendo una cedula al ingresarla

    public $numberAlreadyTaken = false;//valida si el numero ya lo tenia otra cedula

    public function appendNumber($number)
    {
        //se van añadiendo los numeros a medida que el usuario usa el panel
        $this->displayNumber .= $number;
    }

    public function deleteNumber()
    {
        //se van eliminando numeros a medida que se presiona el boton de borrar
        //validar que hay algo para borrar
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
        //se setea la variable customer_id con la cedula que ingresa el usuario en el panel
        $this->customers_id = intval($this->displayNumber);

        //reseteo la validacion de que no existe otra cedula con un numero ya asignado
        $this->numberAlreadyTaken = false;

        //antes de añadir la cedula hay que validar que el o los customers no esten ya asginados a un numero
        if(Customers::where('ci', $this->customers_id)->first('numeros_id')->numeros_id !== null){
            $this->numberAlreadyTaken = true;
            //si no hay nada en el array de customers se oculta el boton de finalizar
            if(count($this->manyCustomers) == 0){
                $this->dispatch('clearDisplay');
            }
            $this->dispatch('errorNumberAlreadyTaken');
        }

        
        // limpia el display para ingresar otra cedula
        $this->displayNumber = '';
        $this->dispatch('error');
        
        //validaciones ! sino existe la cedula el codigo no sigue
        $validated = $this->validate([
            'customers_id' => 'exists:customers,ci',
            'estados_id' => 'required'
        ]);

        // Validar que no se este ingresando una cedula que ya esta dentro del array
        foreach ($this->manyCustomers as $key => $value) {
            if($value['ci'] === $this->customers_id){
                $this->dispatch('ci_repetida');
                $this->repeatedNumber = true;
            }
        }

        //si pasa las validaciones de no repetido y numero no asignado se inserta en el array
        if($this->repeatedNumber == false && $this->numberAlreadyTaken == false){
            array_push($this->manyCustomers, [
                'ci' => $this->customers_id, 'name' => Customers::where('ci', $this->customers_id)->get('name')[0]->name
            ]);
            $this->repeatedNumber = false;
            $this->dispatch('numberAdded');
        }
    }

    public function deleteCi($index)
    {
        //borrar ci del array de manyCustomers
        //validar que halla cedulas ingresadas
        if(count($this->manyCustomers) > 1){
            //buscar la cedula ingresada por "ci"
            unset($this->manyCustomers[$index]);
        }elseif(count($this->manyCustomers) == 1){
            unset($this->manyCustomers[$index]);
            $this->dispatch('clearDisplay');
        }
    }

    public function save()
    {
        //Valido que se halla creado el array de customers en el paso anterior y que no tengan ya un numero asignado
        if(count($this->manyCustomers) > 0 && $this->numberAlreadyTaken === false){
            //creo el numero
            $this->number = Numeros::create([
                'numero' => (Numeros::latest()->first()) ? Numeros::latest()->orderBy('id', 'desc')->first()->numero + 1 : 1,
                'estados_id' => 1,
                'filas_id' => 1
            ]);
        }

        //si el numero se crea, entonces se le asigna el numero al o los customers que halla ingresado su cedula
        if(isset($this->number) && count($this->manyCustomers) >= 1){
            foreach($this->manyCustomers as $customer){
                Customers::where('ci', $customer['ci'])->update([
                    'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
                ]);
            }
        }else{
            $this->dispatch('error');
        }
            
        $this->clear();
        $this->dispatch('numberCreated');                    
    }

    public function render()
    {
        return view('livewire.panel-numerico', [
            'cedulas' => $this->manyCustomers
        ]);
    }
}

