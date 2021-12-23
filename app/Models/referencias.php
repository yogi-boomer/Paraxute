<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referencias extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
    'parentesco3',
    'nombre4',
    'apellidoP4',
    'apellidoM4',
    'estados4',
    'ciudad4',
    'municipio4',
    'telefono3',
    'celular3'
    ];
}
