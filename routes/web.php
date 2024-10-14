<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rutas para alumnos
Route::resource('alumnos', AlumnoController::class);

// Rutas para coches
Route::resource('autos', AutoController::class);
