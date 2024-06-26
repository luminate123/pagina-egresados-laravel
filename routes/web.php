<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReniecController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/perfil', function () {
    return view('perfil');
})->middleware('auth');

Route::get('/empleos', function () {
    return view('empleos');
})->middleware('auth');



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
