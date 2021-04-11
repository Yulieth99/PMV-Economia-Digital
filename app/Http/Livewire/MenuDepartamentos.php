<?php

namespace App\Http\Livewire;

use App\Models\Departament;
use Livewire\Component;

class MenuDepartamentos extends Component
{
    public function render()
    {

        $departamentos = Departament::all();
        return view('livewire.menu-departamentos', compact('departamentos'));
    }
}
