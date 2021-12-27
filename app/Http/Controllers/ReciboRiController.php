<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReciboRiController extends Controller
{
    public function pdf()
    {
        $pdf = PDF::loadView('recibosAlum.pdf');
        return $pdf->stream();
    }
    public function create(){
        
        return view('recibosAlum.recibo');
        
    }

    public function index(){
        
    }
}
