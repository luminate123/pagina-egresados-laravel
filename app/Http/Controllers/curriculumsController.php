<?php

namespace App\Http\Controllers;

use App\Models\Curriculms;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class curriculumsController extends Controller
{
    public function upload(Request $request, $id)
    {
        // Validar el archivo y otros campos
        $request->validate([
            'curriculum' => 'required|file|mimes:pdf,doc,docx',
        ]);

        if ($request->file('curriculum')->isValid()) {
            $file = $request->file('curriculum');
            $originalExtension = $file->getClientOriginalExtension(); // Obtener la extensión original del archivo
            $uniqueId = uniqid(); // Generar un identificador único
            $newFileName = $uniqueId . '.' . $originalExtension; // Construir el nuevo nombre del archivo

            // Guardar el archivo en el disco público en la carpeta curriculums
            $path = $file->storeAs('curriculums', $newFileName, 'public'); // Asegúrate de especificar el disco 'public'

            // Buscar el registro existente
            $existingCurriculum = Curriculms::where('id_usuario', $id)->first();

            // Si existe un registro y tiene un archivo, eliminar el archivo anterior
            if ($existingCurriculum && Storage::disk('public')->exists($existingCurriculum->path)) {
                Storage::disk('public')->delete($existingCurriculum->path);
            }

            if ($existingCurriculum) {
                // Actualizar solo el campo 'path' con la ruta relativa
                $existingCurriculum->path = $path;
                $existingCurriculum->save(); // Guardar los cambios
            } else {
                // Crear un nuevo registro si no existe
                Curriculms::create([
                    'id_usuario' => $id,
                    'path' => $path
                ]);
            }

            return response()->json(['message' => 'Archivo subido exitosamente', 'path' => $path], 200);
        }

        return response()->json(['message' => 'Error al subir el archivo'], 500);
    }


    public function deleteFile(Request $request, $id)
    {
        $curriculum = Curriculms::where('id_usuario', $id)->first();
        if ($curriculum) {
            // Si existe un registro y tiene un archivo, eliminar el archivo anterior
            if ($curriculum->path && Storage::exists($curriculum->path)) {
                Storage::delete($curriculum->path);
            }
            if ($curriculum->path && Storage::disk('public')->exists($curriculum->path)) {
                Storage::disk('public')->delete($curriculum->path);
            }
            // Establecer el path en null y guardar el cambio
            $curriculum->path = '';
            $curriculum->save();

            return response()->json(['success' => true, 'message' => 'Archivo eliminado exitosamente, path actualizado a null'], 200);
        }
        return response()->json(['success' => false, 'message' => 'Error al eliminar el archivo'], 500);
    }
}
