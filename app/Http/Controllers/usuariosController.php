<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class usuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        if ($usuarios->isEmpty()) {
            return response()->json(['message' => 'No hay usuarios registrados'], 404);
        }
        $data = [
            'students' => $usuarios,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // Asignar valor predeterminado 'user' al role si no se proporciona
        $role = $request->input('role', 'user');

        $validator = Validator::make(
            $request->all(),
            [
                'role' => 'in:user,admin', // Validar rol, pero no requerirlo
                'nombres' => 'required|max:255',
                'Apellido_Paterno' => 'required|max:255',
                'Apellido_Materno' => 'required|max:255',
                'DNI' => 'required|size:8|unique:usuarios',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos incorrectos',
                'errors' => $validator->errors(),
            ], 400);
        }

        $usuario = Usuario::create([
            'role' => $role,
            'nombres' => $request->nombres,
            'Apellido_Paterno' => $request->Apellido_Paterno,
            'Apellido_Materno' => $request->Apellido_Materno,
            'DNI' => $request->DNI,
            'password' => Hash::make($request->DNI), // Encriptar el DNI y usarlo como contraseña
        ]);

        if (!$usuario) {
            return response()->json([
                'message' => 'Error al crear el usuario',
            ], 500);
        }

        return response()->json(['message' => 'Usuario creado correctamente'], 201);
    }
}
