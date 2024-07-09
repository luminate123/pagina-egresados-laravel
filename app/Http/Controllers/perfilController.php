<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Usuario;
use App\Models\Datos_academicos;
use App\Models\Datos_profesionales;
use App\Models\Curriculms;
use App\Models\Certificado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class perfilController extends Controller
{

    public function store(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_usuario' => 'required|unique:perfil',
                'fecha_nacimiento' => 'required',
                'genero' => 'required',
                'nacional' => 'required',
            ]
        );

        $perfil = Perfil::create([
            'id_usuario' => $id,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'nacional' => $request->nacional,
        ]);

        // Verificar si ya existe un registro con el mismo id_usuario
        if (Perfil::where('id_usuario', $id)->exists()) {
            return redirect()->route('perfil.show', ['id' => $id])->with([
                'message' => 'Perfil actualizado correctamente.',
                'status' => 'success' // Agrega el estado aquí
            ]);
        }

        return redirect()->route('perfil.show', ['id' => $id])->with('message', 'Perfil creado correctamente.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Verificar si el usuario autenticado no es un administrador
        if (!$user->is_admin && $userId != $id) {
            return redirect()->route('perfil.show', ['id' => $userId]);
        }

        $perfil = Perfil::where('id_usuario', $id)->first();
        $datos_academicos = Datos_academicos::where('id_usuario', $id)->first();
        $usuario = Usuario::find($id);
        $datos_profesionales = Datos_profesionales::where('id_usuario', $id)->first();
        $curriculums = Curriculms::where('id_usuario', $id)->first();
        $certificados = Certificado::where('id_usuario', $id)->get();

        $data = [
            'perfil' => $perfil,
            'usuario' => $usuario,
            'datos_academicos' => $datos_academicos,
            'datos_profesionales' => $datos_profesionales,
            'curriculums' => $curriculums,
            'certificados' => $certificados,
            'status' => 200
        ];

        return view('perfil', [
            'certificados' => $certificados,
            'perfil' => $perfil,
            'usuario' => $usuario,
            'datos_academicos' => $datos_academicos,
            'datos_profesionales' => $datos_profesionales,
            'curriculums' => $curriculums
        ]);

        return view('perfil', [$data]);
    }

    public function update(Request $request, $id)
    {
        $perfil = Perfil::where('id_usuario', $id)->first();

        if (!$perfil) {
            return response()->json(['message' => 'Perfil no encontrado'], 404);
        }

        // Validar los datos antes de la actualización
        $request->validate([
            'fecha_nacimiento' => 'sometimes|required|date',
            'genero' => 'sometimes|required|string',
            'nacional' => 'sometimes|required|string',
        ]);

        $perfil->update([
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'nacional' => $request->nacional,
        ]);

        return redirect()->route('perfil.show', ['id' => $id])->with('message', 'Perfil actualizado correctamente.');

    }
}
