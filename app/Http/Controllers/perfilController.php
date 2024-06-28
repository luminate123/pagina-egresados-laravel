<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Usuario;

class perfilController extends Controller
{

    public function store(Request $request)
    {
        $perfil = Perfil::create([
            'id_usuario' => $request->id_usuario,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'nacional' => $request->nacional,
        ]);

        if (!$perfil) {
            return response()->json([
                'message' => 'Error al crear el perfil',
            ], 400);
        }

        $data = [
            'perfil' => $perfil,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {

        $perfil = Perfil::where('id_usuario', $id)->first();
        $usuario = Usuario::find($id);
        $data = [
            'perfil' => $perfil,
            'usuario' => $usuario,
            'status' => 200
        ];
        return view('perfil', ['perfil' => $perfil, 'usuario' => $usuario]);
        return response()->json($data, 200);
    }
}
