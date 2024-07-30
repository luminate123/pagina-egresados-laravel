<?php

namespace App\Http\Controllers;

use App\Models\Empleo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class empleosController extends Controller
{
    public function index()
    {
        $empleos = Empleo::all();

        return view('empleos', ['empleos' => $empleos]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'titulo' => 'required|max:255',
                'descripcion' => 'required',
                'link' => 'required|url',
                'imagen' => 'nullable|image',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $empleoData = [
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'link' => $request->link,
        ];

        // Verificar si se ha subido una imagen
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('imagenes', $filename, 'public'); // Almacena la imagen en 'public/imagenes' con su nombre original

            // Guardar solo el nombre del archivo en la base de datos
            $empleoData['imagen'] = $filename;
        }

        $empleo = Empleo::create($empleoData);

        if (!$empleo) {
            return redirect()->back()->with('error', 'Error al crear el empleo');
        }

        return redirect()->route('empleos.index');
    }
}
