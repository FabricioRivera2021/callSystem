<?php

namespace App\Livewire;

use App\Models\Numeros;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class AgentesVista extends Component
{
    public $numberToUser = '';

    #[On('setNumberToUser')]
    public function numberToUser($numberToUser)
    {
        //verificar que el agente que llamo al numero no tiene ya otro numero en proceso
        //si algun numero tiene el id del autenticated user no pasa
        if (Numeros::where('user_id', auth()->user()->id)->get() !== null){
            //el usuario ya tiene otro numero en proceso
            return;
        }
        //seteo el numero al agente que lo llamo
        Numeros::where('numero', $numberToUser)
            ->update([
                'user_id' => auth()->user()->id
            ]);
    }

    public function render()
    {
        return view('livewire.agentes-vista', [
            'usuarios' => 
                User::with(['numeros', 'roles'])
                    ->whereNotNull('last_seen')
                    ->get()
        ]);
    }
}
