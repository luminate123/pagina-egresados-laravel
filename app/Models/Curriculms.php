<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculms extends Model
{
    use HasFactory;

    protected $table = 'curriculums';  

    protected $fillable = [
        'id_usuario',
        'path',
    ];
}
