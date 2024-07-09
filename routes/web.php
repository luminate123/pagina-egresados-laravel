<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReniecController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\empleosController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\datos_academicosController;
use App\Http\Controllers\datos_profesionalesController;
use App\Http\Controllers\certificadoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');





Route::get('/empleos', [empleosController::class, 'index'])->name('empleos.index')->middleware('auth');




Route::get('/perfil/{id}', [perfilController::class, 'show'])->middleware('auth')->name('perfil.show');

Route::post('/guardarPerfil/{id}', [perfilController::class, 'store'])->name('perfil.store');

Route::patch('/actualizarPerfil/{id}', [perfilController::class, 'update'])->name('perfil.update');


Route::post('/datos_academicos/{id}', [datos_academicosController::class, 'store'])->name('datos_academicos.store');

Route::patch('/Actdatos_academicos/{id}', [datos_academicosController::class, 'update'])->name('Actdatos_academicos.update');



Route::post('/datos-profesionales/{id}', [datos_profesionalesController::class, 'store'])->name('datos_profesionales.store');

Route::patch('/Actdatos-profesionales/{id}', [datos_profesionalesController::class, 'update'])->name('datos_profesionales.update');


Route::post('/certificados/{id}', [certificadoController::class, 'store'])->name('certificados.store');

Route::delete('/certificados/{id}/{certificado_id}', [certificadoController::class, 'delete'])->name('certificados.delete');



Route::post('login', function () {
    $credentials = request()->only('DNI', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/dashboard');
    }
    return redirect('/');
});


Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/consulta-dni/{dni}', [ReniecController::class, 'consultaDNI']);
