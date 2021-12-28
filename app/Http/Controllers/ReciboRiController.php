<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Programas;
use App\Models\recibo;
use App\Models\Estudiante;

class ReciboRiController extends Controller
{
    public function index(Request $request ){
        $programas = Programas::pluck('tipo_programa')->all();
        $nombre=$request->input('nombre');
        $apellidop=$request->input('apellidop');
        $apellidom=$request->input('apellidom');
        $nombre=$nombre.' '.$apellidop.' '.$apellidop;
        $idest=$request->input('idest');

        $prog=$request->input('prog');
        $idprog=$request->input('idprog');
        $costo=$request->input('costo');
        $codigo=$request->input('codigo');

        return view('recibosAlum.recibo', compact('programas','nombre','idprog','prog','costo','codigo','idest'));
    }
 /*    public function pdf(){
        $nombreCompleto = DB::select('SELECT nombre FROM estudiantes WHERE nombre=nombre');

/*         $recibioInfo=DB::select('');
 */     /*    $pdf = PDF::loadView('recibosRe.pdf', compact('nombreCompleto'));
        return $pdf->stream();
    } */

     
    public function create(Request $request)
    {
        $input = $request->all();
        $nombreCompleto = DB::select('SELECT nombre FROM estudiantes WHERE nombre=nombre');
        $recibioInfo=DB::table('recibos')
        ->join('programas','recibos.id_programas_','=','programas.id')
        ->join('estudiantes','recibos.id_estudiantes_','=','estudiantes.id')
        ->orderBy('recibos.id', 'DESC')->first();
   

        $pdf = PDF::loadView('recibosRe.pdf', compact('nombreCompleto', 'recibioInfo','input'));
        return $pdf->stream();
    }
    public function store(Request $request)
    {

        $fecha = $request->input('dateRegister');
        $forma_pago = $request->input('selectedPago');
        $total = $request->input('total');
        $id_programas_ = $request->input('selectedProgram');
        $id_estudiantes_ = $request->input('idest');
     
        $recibop = array(
            "fecha"=>$fecha,
            "forma_pago"=>$forma_pago,
            "total"=>$total,
            "id_programas_"=> ++$id_programas_,
            "id_estudiantes_"=>$id_estudiantes_

        );

        $estudianteE = Estudiante::find($id_estudiantes_);
        $estudianteE->id_programas_=$id_programas_;
        $estudianteE->save();
        $user = recibo::create($recibop);
        return redirect()->route('recibos.create');

    }

}
 