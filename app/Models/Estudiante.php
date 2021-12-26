<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_P',
        'apellido_M',
        'sexo',
        'escuela_Proc',
        'ultimo_Grado',
        'fecha_Nac',
        /* 'num_Tutores', */
        'id_programas',
        'id_ficha_medicas_',
        'id_domicilios_',
        'id_tutor1s_',
        'id_referencias_'
    ];
}
