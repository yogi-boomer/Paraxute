<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;
use Illuminate\Pagination\Paginator;
use App\Models\Programas;
use Illuminate\Support\Facades\DB;

class Tables extends Component
{
    public function render() 
    {
        $datos = Estudiante::all();
        /* $programas = DB::select('SELECT estudiantes.id_programas_ , programas.tipo_programa FROM estudiantes LEFT JOIN programas ON usuarios.id_programas_= programas.tipo_programa'); */
        $programas = Estudiante::join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
        ->select('tipo_programa','nombre','apellido_M', 'apellido_P','costo_mensual','codigo_Prog','id_programas_','estudiantes.id')
        ->paginate(3);
        return view('livewire.tables', compact('datos','programas'));
    }
}
