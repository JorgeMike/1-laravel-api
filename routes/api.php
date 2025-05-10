<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\entidadController;

// Obtener todas las entidades
Route::get('/entidades', [entidadController::class, 'index']);

// Crear una nueva entidad
Route::post('/entidades', [entidadController::class, 'store']);

// Obtener una entidad por ID
Route::get('/entidades/{id}', [entidadController::class, 'show']);

// Eliminar una entidad por ID
Route::delete('/entidades/{id}', [entidadController::class, 'destroy']);

// Actualizar una entidad completa por ID
Route::put('/entidades/{id}', [entidadController::class, 'update']);
