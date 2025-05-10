<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\entidadController;

// Obtener todas las tareas
Route::get('/entidades', [entidadController::class, 'index']);

// Crear una nueva tarea
Route::post('/entidades', [entidadController::class, 'store']);

// Obtener una tarea por ID
Route::get('/entidades/{id}', [entidadController::class, 'show']);

// Eliminar una tarea por ID
Route::delete('/entidades/{id}', [entidadController::class, 'destroy']);

// Actualizar una tarea completa por ID
Route::put('/entidades/{id}', [entidadController::class, 'update']);
