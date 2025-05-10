<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class entidadController extends Controller
{
    // Funcion para obetener todas las entidades
    public function index()
    {
        $entidades = Entidad::all();

        return response()->json([
            'data' => $entidades,
            'status' => 200,
        ]);
    }

    public function store(Request $request)
    {
        // 1. validar la estructura de la informacion recibida
        $validador = Validator::make($request->all(), [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'required|string|max:1000',
            'estado' => 'required|in:activo,inactivo', // Validar que el estado sea activo o inactivo
        ]);

        // 1.1 si no cumple con la estructura arrojar error
        if ($validador->fails()) {
            return response()->json([
                'msg' => 'Error de validación en los datos',
                'errors' => $validador->errors(),
                'status' => 400,
            ]);
        }

        // 2. si cumple la estructura, crear la entidad
        $entidad = Entidad::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        // 3 si la entidad NO se crea con exito arrojar un error
        if (!$entidad) {
            return response()->json([
                'msg' => 'Error al crear la entidad',
                'status' => 500,
            ]);
        }

        // 4. Si se creo se retorna mensaje de exito y la informacion creada
        return response()->json([
            'msg' => 'Entidad creada correctamente',
            'data' => $entidad,
            'status' => 201,
        ]);
    }

    // Buscar entidad por id
    public function show($id)
    {
        $entidad = Entidad::find($id);

        if (!$entidad) {
            return response()->json([
                'msg' => 'Entidad no encontrada',
                'status' => 404,
            ]);
        }

        return response()->json([
            'data' => $entidad,
            'status' => 200,
        ]);
    }

    // Eliminar entidad por id
    public function destroy($id)
    {
        $entidad = Entidad::find($id);

        if (!$entidad) {
            return response()->json([
                'msg' => 'Entidad no encontrada',
                'status' => 404,
            ]);
        }

        $entidad->delete();

        return response()->json([
            'msg' => 'Entidad eliminada correctamente',
            'status' => 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        $entidad = Entidad::find($id);

        // Validar la existencia de la entidad que se quiere editar
        if (!$entidad) {
            return response()->json([
                'msg' => 'Entidad no encontrada',
                'status' => 404,
            ]);
        }

        // Si la entidad existe validamos la informacion que se paso
        $validador = Validator::make($request->all(), [
            'nombre' => 'string|max:100',
            'descripcion' => 'string|max:1000',
            'estado' => 'in:activo,inactivo', // Validar que el estado sea activo o inactivo
        ]);

        // Si algo no cumple se arroja un error
        if ($validador->fails()) {
            return response()->json([
                'msg' => 'Error de validación en los datos',
                'errors' => $validador->errors(),
                'status' => 400,
            ]);
        }

        // Si cumple se actualiza la entidad
        $entidad->update($request->all());

        return response()->json([
            'msg' => 'Entidad actualizada correctamente',
            'data' => $entidad,
            'status' => 200,
        ]);
    }
}
