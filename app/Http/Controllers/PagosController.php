<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante;
use App\Models\Programas;
use App\Models\recibo;
class PagosController extends Controller
{
    //
    public function index(){
        $id = $_GET["idEst"];
        $infoRecibos = DB::table('estudiantes')
        ->join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
        ->join('recibos', 'recibos.id_estudiantes_', '=', 'estudiantes.id' )
        ->select('tipo_programa','nombre','apellido_M', 'apellido_P', 'id_formatos_', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog')
        ->where('estudiantes.id' ,'=', $id)
        ->get();
        //dd($nombre);
         return view('pagosTodo.pagos', compact('infoRecibos'));
    }
}
