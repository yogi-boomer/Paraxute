<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ReciboRiController extends Controller
{
    public function index(){
        return view('recibosAlum.recibo');
    }
}
