<?php

namespace App\Livewire;

use App\Models\UserPosition;
use Livewire\Component;

class NavBar extends Component
{
    public $position = '';

    public function render()
    {
        return view('livewire.nav-bar', [
            'positions' => UserPosition::all()
        ]);
    }
}
