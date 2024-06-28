<?php

namespace App\Http\Controllers;

use App\Models\Empleo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class empleosController extends Controller
{
    public function index()
    {
        $empleos = Empleo::all();

        $data = [
            'empleos' => $empleos,
            'status' => 200
        ];
        return view('empleos', ['empleos' => $empleos]);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'titulo' => 'required|max:255',
                'descripcion' => 'required',
                'fecha_publicacion' => 'required|date',
                'link' => 'required|url',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos incorrectos',
                'errors' => $validator->errors(),
            ], 400);
        }

        $empleo = Empleo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_publicacion' => $request->fecha_publicacion,
            'link' => $request->link,
        ]);

        if (!$empleo) {
            return response()->json([
                'message' => 'Error al crear el empleo',
            ], 500);
        }

        return response()->json(['message' => 'Empleo creado correctamente'], 201);
    }
}
