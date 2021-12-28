<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Models\Programas;

class ReciboRiController extends Controller
{
    public function index(){
        $programas = Programas::all();
        return view('recibosAlum.recibo', compact('programas'));
    }
    public function pdf(){
        $nombreCompleto = DB::select('SELECT nombre FROM estudiantes WHERE nombre=nombre');
        $pdf = PDF::loadView('recibosRe.pdf', compact('nombreCompleto'));
        return $pdf->stream();
    }
}
 