<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReniecController extends Controller
{
    public function consultaDNI($dni)
    {
        $token = config('services.reniec.token');
        $response = Http::withHeaders([
            'Referer' => 'https://apis.net.pe/consulta-dni-api',
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'No se pudo obtener la información'], 500);
        }
    }
}
