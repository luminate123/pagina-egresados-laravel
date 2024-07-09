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
                'fecha_publicacion' => 'nullable|date', // Make it nullable if not mandatory
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $empleo = Empleo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'link' => $request->link,
            'fecha_publicacion' => $request->fecha_publicacion ?? now(), // Use current date if not provided
        ]);

        if (!$empleo) {
            return redirect()->back()->with('error', 'Error al crear el empleo');
        }

        return redirect()->route('empleos.index')->with('success', 'Empleo creado correctamente');
    }
}
