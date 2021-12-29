<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tutor1 extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'parentesco',
        'nombre',
        'apellido_p',
        'apellido_m',
        'fecha_nac',
        'ultimo_grado',
        'estado_civil',
        'nom_trabajo',
        'id_contacto_',
        'id_domicilio_',
    ];
}
