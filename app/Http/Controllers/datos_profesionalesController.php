<?php

namespace App\Http\Controllers;

use App\Models\Curriculms;
use Illuminate\Support\Facades\Validator;
use App\Models\Datos_profesionales;
use App\Models\Perfil;
use Illuminate\Http\Request;

class datos_profesionalesController extends Controller
{
    public function store(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_usuario' => 'required|unique:datos_profesionales',
                'situacion_laboral' => 'required',
                'empresa_actual' => 'nullable|string',
                'puesto_actual' => 'nullable|string',
                'sector_empresa_actual' => 'nullable|string',
                'redes_sociales' => 'nullable|string',
                'curriculum' => 'required|unique:datos_profesionales',
            ]
        );

        $curriculum = Curriculms::where('id_usuario', $id)->first();
        $curriculumID = $curriculum->id;

        $datos_profesionales = Datos_profesionales::create([
            'id_usuario' => $id,
            'situacion_laboral' => $request->situacion_laboral,
            'empresa_actual' => $request->empresa_actual,
            'puesto_actual' => $request->puesto_actual,
            'sector_empresa_actual' => $request->sector_empresa_actual,
            'redes_sociales' => $request->redes_sociales,
            'curriculum' => $curriculumID,
        ]);

        return redirect()->route('perfil.show', ['id' => $id])->with('success2', 'Perfil actualizado correctamente.');
    }

    public function update(Request $request, $id)
    {
        // Validar los campos
        $validator = Validator::make(
            $request->all(),
            [
                'situacion_laboral' => 'sometimes|required|string',
                'empresa_actual' => 'sometimes|required|string',
                'puesto_actual' => 'sometimes|required|string',
                'sector_empresa_actual' => 'sometimes|required|string',
                'redes_sociales' => 'sometimes|required|string',
            ]
        );
        // Retornar errores de validación si existen
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $datos_profesionales = Datos_profesionales::where('id_usuario', $id)->first();

        if (!$datos_profesionales) {
            return response()->json(['message' => 'No se encontró el registro'], 404);
        }

        $perfil = Perfil::where('id_usuario', $id)->first();
        $datos_profesionales->update([
            'situacion_laboral' => $request->situacion_laboral,
            'empresa_actual' => $request->empresa_actual,
            'puesto_actual' => $request->puesto_actual,
            'sector_empresa_actual' => $request->sector_empresa_actual,
            'redes_sociales' => $request->redes_sociales,
        ]);

        return redirect()->route('perfil.show', ['id' => $perfil->id])->with('success2', 'Perfil actualizado correctamente.');
    }

    public function upload(Request $request, $id)
    {
        // Validar el archivo y otros campos
        $request->validate([
            'curriculum' => 'required',
            'situacion_laboral' => 'required|string',
            'empresa_actual' => 'required|string',
            'puesto_actual' => 'required|string',
            'sector_empresa_actual' => 'required|string',
            'redes_sociales' => 'required|string',
        ]);

        // Guardar el archivo en la carpeta 'curriculums'
        if ($request->file('curriculum')->isValid()) {
            $path = $request->file('curriculum')->store('curriculums');

            // Crear el registro en datos_profesionales
            Datos_profesionales::create([
                'id_usuario' => $id,
                'situacion_laboral' => $request->situacion_laboral,
                'empresa_actual' => $request->empresa_actual,
                'puesto_actual' => $request->puesto_actual,
                'sector_empresa_actual' => $request->sector_empresa_actual,
                'redes_sociales' => $request->redes_sociales,
                'curriculum' => $path,
            ]);

            return redirect()->route('perfil.show', ['id' => $id])->with('success1', 'Perfil actualizado correctamente.');
        }

        return response()->json(['message' => 'Error al subir el archivo'], 500);
    }
}
