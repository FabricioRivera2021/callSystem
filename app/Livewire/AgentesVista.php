<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AgentesVista extends Component
{
    public function render()
    {
        return view('livewire.agentes-vista', [
            'usuarios' => User::with(['numero', 'roles'])->get()
        ]);
    }
}
