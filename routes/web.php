<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReniecController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function () {
    return view('registro');
});



Route::get('/consulta-dni/{dni}', [ReniecController::class, 'consultaDNI']);