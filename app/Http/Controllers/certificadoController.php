<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class certificadoController extends Controller
{

    public function store(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_usuario' => 'required',
                'nombre' => 'required',
                'descripcion' => 'required',
            ]
        );

        $certificado = Certificado::create([
            'id_usuario' => $id,
            'nombre' => $request->nombrecer,
            'descripcion' => $request->descripcioncer,
        ]);

        return redirect()->route('perfil.show', ['id' => $id])->with('success3', 'Certificado agregado correctamente.');
    }


    public function delete($id_usuario, $certificado_id)
    {
        // Busca el certificado por su ID y el ID del usuario
        $certificado = Certificado::where('id_usuario', $id_usuario)->where('id', $certificado_id)->firstOrFail();
        $certificado->delete();

        // Redirige a una ruta deseada después de eliminar el certificado
        return redirect()->route('perfil.show', ['id' => $id_usuario])->with('success3', 'Certificado eliminado correctamente.');
    }
}
