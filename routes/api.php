<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\usuariosController;

Route::get('/usuarios', [usuariosController::class, 'index']);


Route::get('/usuarios/{id}', function () {
    return 'Obteniendo un estudiante';
});


Route::post('/usuarios', [usuariosController::class, 'store']);

Route::patch('/usuarios/{id}', function () {
    return 'Actualizando';
});


Route::delete('/usuarios/{id}', function () {
    return 'Eliminando estudiante';
});
