<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReniecController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/perfil', function () {
    return view('perfil');
});

Route::get('/empleos', function () {
    return view('empleos');
});






Route::get('/consulta-dni/{dni}', [ReniecController::class, 'consultaDNI']);