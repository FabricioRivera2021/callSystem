<?php

namespace App\Livewire;

use App\Models\Customers;
use App\Models\Estados;
use App\Models\Numeros;
use App\Models\User;
use App\Models\UserPosition;
use Livewire\Component;
use Livewire\Attributes\On;

class NumerosVista extends Component
{
    public $estado_id = '';

    public $number = '';

    public $fila_id = '';

    public $query = '';

    public $searchBox = '';

    public $canCall = ''; //!tenemos un problema, esto se resetea cada ves que se carga la pagina, localstorage??

    public $currentSelectedNumber = null;//numero actual seleccionado

    public $firstCall = false;

    //llamoda al numero que este sin atender
    public function callNumber($number)
    {
        //tomar el numero
        $numero = Numeros::where('numero', $number)->get();
        
        //seteo el ultimo numero que se llamo
        if(session('numeroSeleccionado') != null){
            $this->currentSelectedNumber = session('numeroSeleccionado');
        }

        //si el rol actual no es administrador
        if(auth()->user()->roles->roles === 'regular'){
            //si ya hay un numero seteado habria que buscar la forma de que, no se pueda llamar a otro numero si ya hay uno en proceso
            if($this->currentSelectedNumber === null){
                $this->currentSelectedNumber = $numero;
                
                // dd(Numeros::find($this->currentSelectedNumber[0]->estados_id + 1));
                // dd($this->currentSelectedNumber[0]->numero);
                $proximoEstado = Numeros::find($this->currentSelectedNumber[0]->numero)->estados_id;
                // dd(Numeros::find($this->currentSelectedNumber[0]->numero)->estados_id);

                // dd($this->currentSelectedNumber);
                session([
                    'numeroSeleccionado' => $this->currentSelectedNumber,
                    'numeroSeleccionadoForColor' => $this->currentSelectedNumber[0]->numero,
                    'numeroToNextState' => Estados::where('id', $proximoEstado + 1)->get()[0]->estados
                ]);
                //bloquear el select de position del navbar cuando se tenga un numero elejido
                $this->dispatch('blockPosition', numero: $number);

                //muestra el numero seleccionado en el panel chico
                $this->dispatch('currentNumber', numero: $number);

                //asociar el numero que se llamo al usuario que lo llamo
                $this->dispatch('setNumberToUser', numberToUser: $number);
                $this->firstCall = true;
                // dd($this->currentSelectedNumber);
            }
            else{
                //si el usuario ya tiene un numero seteado no lo va a dejar tomar otro
                $this->dispatch('numberAlreadyTaken');
            }
        }
    }

    #[On('currentPosition')]
    public function puesto($position)
    {
        //tengo el id del puesto en la vista de los numeros
        //dependiendo del puesto que este activo, el boton de llamar cambia de acuerdo al estado donde este el numero
        $this->canCall = UserPosition::where('id', $position)->get('position')[0]->position;
    }
    
    //cambiar el estado a preparacion
    #[On('setNextPosition')]
    public function setNextPosition($numero, $currentState)
    {
        Numeros::where('numero', $numero)->update([
            'estados_id' => $currentState + 1 
        ]);
        $this->currentSelectedNumber = null;
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

    #[On('createNumber')]
    public function numberCreated()
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
                                ->orderBy('numero')
                                ->get(),
            'canCall' => $this->canCall
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