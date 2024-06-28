<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\empleosController;

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

//empleos
Route::get('/empleos', [empleosController::class, 'index']);

Route::get('/empleos/{id}', function () {
    return 'Obteniendo un empleo';
});
Route::post('/empleos', [empleosController::class, 'store']);

Route::patch('/empleos/{id}', function () {
    return 'Actualizando';
});

Route::delete('/empleos/{id}', function () {
    return 'Eliminando empleo';
});


Route::get('/perfil/{id}', [perfilController::class,'show']);

Route::post('/perfil', [perfilController::class,'store']);
    


