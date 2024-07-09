<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_profesionales extends Model
{
    use HasFactory;


    protected $table = 'datos_profesionales';

    protected $fillable = [
        'id_usuario',
        'situacion_laboral',
        'empresa_actual',
        'puesto_actual',
        'sector_empresa_actual',
        'redes_sociales',
        'curriculum',
    ];
}
