<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_academicos extends Model
{
    use HasFactory;

    protected $table = 'datos_academicos';

    protected $fillable = [
        'id_usuario',
        'año_egreso',
        'bachiller_academico',
        'titulo_academico',
        'maestria',
        'doctorado',
    ];
}
