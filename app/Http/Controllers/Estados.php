<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Estados extends Controller
{
    public function estados()
    {
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados');
        
        if ($response->successful()) {
            $estados = $response->json();
            $estadosUF = [];
            
            foreach ($estados as $estado) {
                $estadosUF[$estado['sigla']] = $estado['nome'];
            }
            
            return view('sua_view', ['estados' => $estadosUF]);
        } else {
            return response()->json(['error' => 'Não foi possível obter os estados.'], 500);
        }
    }
}
