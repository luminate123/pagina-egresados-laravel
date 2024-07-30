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
    public function mostrar()
    {
        $usuarios = Usuario::all();
        $datos_academicos = Datos_academicos::all();
        $datos_profesionales = Datos_profesionales::all();

        $usuariosCount1 = Usuario::where('role', 'user')->count();
        $usuariosCount = Datos_academicos::count();
        $usuariosCount2 = Datos_profesionales::count();



        return view('estadisticas', [
            'usuarios' => $usuarios,
            'datos_academicos' => $datos_academicos,
            'usuariosCount' => $usuariosCount,
            'usuariosCount1' => $usuariosCount1,
            'datos_profesionales' => $datos_profesionales,
            'usuariosCount2' => $usuariosCount2
        ]);
    }

    public function index(Request $request)
    {
        $searchName = $request->input('search_name');
        $searchApellidoPaterno = $request->input('search_apellido_paterno');
        $searchApellidoMaterno = $request->input('search_apellido_materno');
        $searchAñoEgreso = $request->input('search_año_egreso');

        $usuarios = Usuario::query()
            ->when($searchName, function ($query, $searchName) {
                return $query->where('nombres', 'like', "%{$searchName}%");
            })
            ->when($searchApellidoPaterno, function ($query, $searchApellidoPaterno) {
                return $query->where('Apellido_Paterno', 'like', "%{$searchApellidoPaterno}%");
            })
            ->when($searchApellidoMaterno, function ($query, $searchApellidoMaterno) {
                return $query->where('Apellido_Materno', 'like', "%{$searchApellidoMaterno}%");
            })
            ->get();

        $datos_academicos = Datos_academicos::all();

        if ($searchAñoEgreso) {
            $usuarios = $usuarios->filter(function ($usuario) use ($datos_academicos, $searchAñoEgreso) {
                foreach ($datos_academicos as $dato) {
                    if ($dato->id_usuario === $usuario->id && date('Y', strtotime($dato->año_egreso)) == $searchAñoEgreso) {
                        return true;
                    }
                }
                return false;
            });
        }
        $años_egreso = Datos_academicos::selectRaw('YEAR(año_egreso) as año');

        return view('perfiles', [
            'datos_academicos' => $datos_academicos,
            'usuarios' => $usuarios,
            'años_egreso' => $años_egreso,
            'searchName' => $searchName,
            'searchApellidoPaterno' => $searchApellidoPaterno,
            'searchApellidoMaterno' => $searchApellidoMaterno,
            'searchAñoEgreso' => $searchAñoEgreso,
        ]);
    }




    public function store(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_usuario' => 'required|unique:perfil',
                'fecha_nacimiento' => 'required',
                'genero' => 'required',
                'telefono' => 'required',
                'correo' => 'required',
                'nacional' => 'required',
            ]
        );

        $perfil = Perfil::create([
            'id_usuario' => $id,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'nacional' => $request->nacional,
        ]);

        // Verificar si ya existe un registro con el mismo id_usuario
        if (Perfil::where('id_usuario', $id)->exists()) {
            return redirect()->route('perfil.show', ['id' => $id])->with([
                'message' => 'Perfil actualizado correctamente.',
                'status' => 'success' // Agrega el estado aquí
            ]);
        }
        toastr()->success('Datos personales guardados', ['timeOut' => 5000], 'Exitoso');
        return redirect()->route('perfil.show', ['id' => $id])->with('message', 'Perfil creado correctamente.');
    }

    public function showperfil($id)
    {
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

        return view('Visualizarperfil', [
            'certificados' => $certificados,
            'perfil' => $perfil,
            'usuario' => $usuario,
            'datos_academicos' => $datos_academicos,
            'datos_profesionales' => $datos_profesionales,
            'curriculums' => $curriculums
        ]);
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
            'telefono' => 'sometimes|required|string',
            'correo' => 'sometimes|required|email',
            'nacional' => 'sometimes|required|string',
        ]);

        $perfil->update([
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'nacional' => $request->nacional,
        ]);
        toastr()->success('Datos personales actualizados', ['timeOut' => 5000], 'Exitoso');
        return redirect()->route('perfil.show', ['id' => $id])->with('message', 'Perfil actualizado correctamente.');
    }
}
