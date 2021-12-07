<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ficha_medica extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tipo_sangre',
        'alergia',
        'problemaVis',
        'enfermedad_cron',
        'deficiencia_cogn',
        'deficiencia_mot',
        'transtorno_Psic',
        'medicamentos',
        'conducta'
    ];
}
