<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí registras las rutas API de tu aplicación. Estas rutas se cargan
| automáticamente por RouteServiceProvider dentro del grupo "api".
|
*/

// Ruta protegida por Sanctum (si la usas más adelante)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta para registrar usuarios (POST)
Route::post('/registrar', [RegistroController::class, 'registrar']);

// Ruta para obtener la lista de usuarios (GET)
Route::get('/usuarios', [RegistroController::class, 'index']);
