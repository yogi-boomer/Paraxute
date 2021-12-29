<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante;
use App\Models\Programas;
use App\Models\recibo;
class Billing extends Component
{
    public function render(Request $request)
    {
        $busqueda =trim($request->get('busqueda'));
        if($busqueda != null){
            $infoRecibos = DB::table('estudiantes')
           ->join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
           ->join('recibos', 'recibos.id_estudiantes_', '=', 'estudiantes.id' )
           ->select('tipo_programa','nombre','apellido_M', 'apellido_P', 'id_formatos_', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog')
           ->where('nombre', 'LIKE', '%'.$busqueda.'%')
           ->get();
        }else{
            $infoRecibos = DB::table('estudiantes')
            ->join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
            ->join('recibos', 'recibos.id_estudiantes_', '=', 'estudiantes.id' )
            ->select('tipo_programa','nombre','apellido_M', 'apellido_P', 'id_formatos_', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog')
            ->get();
        }
       // $reciboInfo=DB::select('SELECT nombre, apellido_P, apellido_M FROM estudiantes');
       
        return view('livewire.billing', compact('infoRecibos','busqueda'));
    }
}
