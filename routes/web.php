<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReniecController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\empleosController;
use App\Http\Controllers\perfilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::get('/perfil/{id}', [perfilController::class,'show'])->middleware('auth');

Route::get('/empleos', [empleosController::class, 'index'])->middleware('auth');


Route::post('login', function () {
    $credentials = request()->only('DNI', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/dashboard');
    }
    return redirect('/');
});


Route::post('registroempleo', function () {
    $empleo = new App\Models\Empleo();
    $empleo->titulo = request()->title;
    $empleo->descripcion = request()->description;
    $empleo->link = request()->link;
    $empleo->fecha_publicacion = now(); // Set the current date and time
    $empleo->save();
    return redirect('/empleos');
});



Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/consulta-dni/{dni}', [ReniecController::class, 'consultaDNI']);
