<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante;
use App\Models\Programas;
use App\Models\recibo;
class PagosController extends Controller
{
    //
    public function index(Request $request){
        $busqueda =trim($request->get('busqueda'));
        $id = $_GET["idEst"];
        intval($busqueda);
        if($busqueda != null){
            $infoRecibos = DB::table('estudiantes')
        ->join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
        ->join('recibos', 'recibos.id_estudiantes_', '=', 'estudiantes.id' )
        ->select('tipo_programa','nombre','apellido_M', 'apellido_P', 'id_formatos_','estudiantes.id', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog')
        ->where('recibos.id' ,'LIKE', '%'.$busqueda.'%');
        }else{
        
        $infoRecibos = DB::table('estudiantes')
        ->join('programas', 'programas.id', '=', 'estudiantes.id_programas_')
        ->join('recibos', 'recibos.id_estudiantes_', '=', 'estudiantes.id' )
        ->select('tipo_programa','nombre','apellido_M', 'apellido_P', 'id_formatos_', 'recibos.id','recibos.fecha','forma_pago','total','codigo_Prog')
        ->where('estudiantes.id' ,'=', $id)
        ->paginate(5);
    }
        //dd($nombre);
         return view('pagosTodo.pagos', compact('infoRecibos','busqueda'));
    }
}
