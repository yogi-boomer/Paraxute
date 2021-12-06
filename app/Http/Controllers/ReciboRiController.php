<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class reciboRiController extends Controller
{
    public function index(){
        return view('recibos.recibo');
    }
}
