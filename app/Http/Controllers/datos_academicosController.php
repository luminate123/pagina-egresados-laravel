<?php

namespace App\Http\Controllers;

use App\Models\Datos_academicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Perfil;

class datos_academicosController extends Controller
{
    public function store(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'año_egreso' => 'required',
                'bachiller_academico' => 'required',
                'titulo_academico' => 'required',
                'maestria' => 'nullable|string',
                'doctorado' => 'nullable | string  ',
            ]
        );

        // Retornar errores de validación si existen
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Verificar si ya existe un registro con el mismo id_usuario
        if (Datos_academicos::where('id_usuario', $id)->exists()) {
            return back()->with('error', 'Ya existe un registro de datos academicos para este usuario.');
        }


        $datos_academicos = datos_academicos::create([
            'id_usuario' => $id,
            'año_egreso' => $request->año_egreso,
            'bachiller_academico' => $request->bachiller_academico,
            'titulo_academico' => $request->titulo_academico,
            'maestria' => $request->maestria,
            'doctorado' => $request->doctorado,
        ]);

        return redirect()->route('perfil.show', ['id' => $id])->with('success1', 'Perfil actualizado correctamente.');
    }

    public function update(Request $request, $id)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'año_egreso' => 'sometimes|required|string',
                'bachiller_academico' => 'sometimes|required|string',
                'titulo_academico' => 'sometimes|required|string',
                'maestria' => 'sometimes|required|string',
                'doctorado' => 'sometimes|required|string',
            ]
        );

        // Retornar errores de validación si existen
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $datos_academicos = Datos_academicos::where('id_usuario', $id)->first();

        if (!$datos_academicos) {
            return response()->json(['error' => 'Datos academicos no encontrados'], 404);
        }
        $perfil = Perfil::where('id_usuario', $id)->first();
        $datos_academicos->update([
            'año_egreso' => $request->año_egreso,
            'bachiller_academico' => $request->bachiller_academico,
            'titulo_academico' => $request->titulo_academico,
            'maestria' => $request->maestria,
            'doctorado' => $request->doctorado,
        ]);

        return redirect()->route('perfil.show', ['id' => $perfil->id])->with('success1', 'Perfil actualizado correctamente.');
    }
}
