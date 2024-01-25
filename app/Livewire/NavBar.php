<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserPosition;
use Livewire\Component;

class NavBar extends Component
{
    //data del puesto que se halla seleccionado
    public $position_data = '';

    //nombre del puesto que se halla seleccionado
    public $position = '';

    //selecciona la pocicion donde se encuentra el usuario actualmente (ventanilla, preparacion, etc)
    public function handlePosition($id)
    {
        if($this->position_data = UserPosition::findOrFail($id))
        {
            //actualizo el nuevo puesto donde esta el usuario
            User::where('id', auth()->user()->id)->update([
                'positions_id' => $id
            ]);

            //luego de actualizar el current puesto, habria que mostrarlo en el navbar
            $currentPosition = UserPosition::find($id)->id;
            session(['position' => $currentPosition]);

            //dispatch hacia la vista de numeros, enviando el id
            $this->dispatch('currentPosition', position: $this->position_data);
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