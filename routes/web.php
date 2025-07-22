<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

// Redirigir la raíz '/' directamente al formulario de registro
Route::get('/', [RegistroController::class, 'formulario'])->name('registro.formulario');

Route::get('/registro', [RegistroController::class, 'formulario'])->name('registro.formulario');
Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.registrar');
