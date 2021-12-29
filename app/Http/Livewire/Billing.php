<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante;
use App\Models\Programas;
use App\Models\recibo;
class Billing extends Component
{
    public function render()
    {
       // $reciboInfo=DB::select('SELECT nombre, apellido_P, apellido_M FROM estudiantes');
       $infoRecibos = DB::table('estudiantes')
       ->join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
       ->join('recibos', 'recibos.id_estudiantes_', '=', 'estudiantes.id' )
       ->select('tipo_programa','nombre','apellido_M', 'apellido_P','id_programas_','estudiantes.id', 'id_formatos_', 'recibos.id')
       ->get();
        return view('livewire.billing', compact('infoRecibos'));
    }
}
