<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserPosition;
use Livewire\Component;

class NavBar extends Component
{
    //input del current puesto
    public $position_id = '';

    //actualizo el puesto
    public $position = '';

    public function handlePosition($id)
    {
        //! hay que seguir aca, reever la logica de esto

        if($this->position_id = UserPosition::findOrFail($id))
        {
            //actualizo el nuevo puesto donde esta el usuario
            //tengo el id del puesto, necesito actualizar en la BD en la TABLA de USER el puesto_id
            User::where('id', auth()->user()->id)->update([
                'positions_id' => $id
            ]);

            //luego de actualizar el current puesto, habria que mostrarlo en el navbar

            //este seria el dispatch hacia la vista de todos los numeros
            $this->dispatch('currentPosition', position: $this->position_id);
        }
    }

    public function render()
    {
        return view('livewire.nav-bar', [
            'positions' => UserPosition::all(),
            'currPosition' => User::where('id', auth()->user()->id)->get()
        ]);
    }
}