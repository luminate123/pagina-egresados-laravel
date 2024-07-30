<?php

use App\Http\Controllers\curriculumsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\empleosController;
use App\Http\Controllers\datos_academicosController;
use App\Http\Controllers\datos_profesionalesController;
use App\Http\Controllers\certificadoController;


Route::get('/usuarios/{id}', function () {
    return 'Obteniendo un estudiante';
});





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





//perfil






// api.php





Route::post('/curriculums/{id}', [curriculumsController::class, 'upload'])->name('curriculums.upload');

Route::patch('/actcurriculums/{id}', [curriculumsController::class, 'upload'])->name('actcurriculums.upload');

Route::delete('/delcurriculums/{id}', [curriculumsController::class, 'deleteFile'])->name('curriculums.deleteFile');



