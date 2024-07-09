<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    use HasFactory;
    
    protected $table = 'certificados';

    protected $fillable = [
        'id_usuario',
        'nombre',
        'descripcion',
    ];
}
