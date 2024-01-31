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

    protected $listeners = [
        'componentAction' => 'handleComponentAction',
    ];

    //llamoda a un numero desde la vista
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
                // dd(session('numeroSeleccionado'), session('positionName'));
            }
            else{
                //si el usuario ya tiene un numero seteado no lo va a dejar tomar otro
                $this->dispatch('numberAlreadyTaken');
            }
        }
    }

    //retomar un numero pausado o cancelado
    public function retomarNumero($numero, $state)
    {
        //! el usuario que retome el numero lo tiene que retomar desde la pocision en la que este
        //si hay un numero seleccionado se llama al error
        if($this->currentSelectedNumber === null){
            //basicamente hay que sacar el paused o el canceled dependiendo de cual sea el que tiene
            //hay que tener en cuenta que lo puede llamar otro usuario
            //y hay que tener en cuenta desde que posicion lo esta llamando

            Numeros::where('numero', $numero)
                ->update([
                    $state => false, //paused or canceled => false
                    'estados_id' => session('position') - 1 //estados_id => el estado que se halla elejido en el navbar
                ]);
    
            //una ves que se libera el numero se deberia llamar a ese numero
            //para eso llamo a la funcion callNumber como si el usuario ubiera tecleado llamar
            $this->callNumber($numero);
        }else{
            //si el usuario ya tiene un numero seteado no lo va a dejar tomar otro
            $this->dispatch('numberAlreadyTaken');
        }

    }

    #[On('currentPosition')]
    public function puesto($position)
    {
        //tengo el id del puesto en la vista de los numeros
        //dependiendo del puesto que este activo, el boton de llamar cambia de acuerdo al estado donde este el numero
        $this->canCall = UserPosition::where('id', $position)->get('position')[0]->position;
    }
    
    //cambiar el estado al siguiente
    #[On('setNextPosition')]
    public function setNextPosition($numero, $currentState)
    {
        //si el estado esta en 4(entrega) se termina el proceso
        if($currentState === 4){
            $this->currentSelectedNumber = null;
            return;
        }

        Numeros::where('numero', $numero)->update([
            'estados_id' => $currentState + 1 
        ]);
        $this->currentSelectedNumber = null;
    }

    //cambiar el estado a pausado
    #[On('setPausarNumero')]
    public function setPausarNumero($numero, $currentState)
    {
        Numeros::where('numero', $numero)->update([
            'estados_id' => $currentState,
            'paused' => true
        ]);
        $this->currentSelectedNumber = null;
    }

    //cambiar el estado a cancelado
    #[On('setCancelarNumero')]
    public function setCancelarNumero($numero, $currentState)
    {
        Numeros::where('numero', $numero)->update([
            'estados_id' => $currentState,
            'canceled' => true
        ]);
        $this->currentSelectedNumber = null;
    }
    
    //cambia el estado a lo que sea que halla eljeido el usuario
    #[On('setDerivarA')]
    public function setDerivarA($key, $numero)
    {
        Numeros::where('numero', $numero)->update([
            'estados_id' => $key
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

    // #[On('createNumber')]
    // public function numberCreated($numero, $customers, $numberAlreadyTaken)
    // {
    //     //Valido que se halla creado el array de customers en el paso anterior y que no tengan ya un numero asignado
    //     dd('test');
    //     if(count($customers) > 0 && $numberAlreadyTaken === false){
    //         //creo el numero
    //         $number = Numeros::create([
    //             'numero' => (Numeros::latest()->first()) ? Numeros::latest()->orderBy('id', 'desc')->first()->numero + 1 : 1,
    //             'estados_id' => 1,
    //             'filas_id' => 1,
    //             'paused' => false,
    //             'canceled' => false,
    //         ]);
    //     }

    //     //si el numero se crea, entonces se le asigna el numero al o los customers que halla ingresado su cedula
    //     if($number && count($customers) >= 1){
    //         foreach($customers as $customer){
    //             Customers::where('ci', $customer['ci'])->update([
    //                 'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
    //             ]);
    //         }
    //     }else{
    //         $this->dispatch('error');
    //     }               
    // }

    public function handleComponentAction($data)
    {
        //Valido que se halla creado el array de customers en el paso anterior y que no tengan ya un numero asignado
        dd('test');
        if(count($data->customers) > 0 && $data->numberAlreadyTaken === false){
            //creo el numero
            $number = Numeros::create([
                'numero' => (Numeros::latest()->first()) ? Numeros::latest()->orderBy('id', 'desc')->first()->numero + 1 : 1,
                'estados_id' => 1,
                'filas_id' => 1,
                'paused' => false,
                'canceled' => false,
            ]);
        }

        //si el numero se crea, entonces se le asigna el numero al o los customers que halla ingresado su cedula
        if($number && count($data->customers) >= 1){
            foreach($data->customers as $customer){
                Customers::where('ci', $customer['ci'])->update([
                    'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
                ]);
            }
        }else{
            $this->dispatch('error');
        }       
    }

    public function render()
    {
        $filter = $this->estado_id;

        $search = $this->searchBox;

        $fila = $this->fila_id;

        return view('livewire.numeros-vista', [
            'numeros' => Numeros::when($filter ?? null, function($query) use ($filter){
                                            if($filter == 'paused'){
                                                $query->where('paused', true);
                                            }elseif($filter == 'canceled'){
                                                $query->where('canceled', true);
                                            }else{
                                                $query->where('estados_id', $filter);
                                            }
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