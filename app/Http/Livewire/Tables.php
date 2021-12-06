<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;

class Tables extends Component
{
    public function render() 
    {
        $datos = Estudiante::all();
        return view('livewire.tables', compact('datos'));
    }
}
