<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
    'tipo_programa',
    'codigo_Prog',
    'num_sesiones_mes',
    'costo_mensual',
    'id_formato_'
    ];
}