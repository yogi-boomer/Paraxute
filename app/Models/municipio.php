<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
    'estado_id',
    'clave',
    'nombre',
    'activo',
    ];
}
