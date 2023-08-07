<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Cidades extends Controller
{
    public function cidades(Request $request)
    {
        $estadoSelecionado = $request->input('estado');

        // Faz a requisição para a API ViaCEP para obter as cidades do estado selecionado
        $response = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/municipios");

        if ($response->successful()) {
            $cidades = $response->json();
            return response()->json($cidades);
        } else {
            return response()->json(['error' => 'Não foi possível obter as cidades.'], 500);
        }
    }
}
