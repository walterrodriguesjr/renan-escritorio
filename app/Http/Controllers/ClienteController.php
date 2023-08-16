<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function listarClientes()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    public function adicionarCliente(Request $request)
    {
        $dados = $request->json()->all();

        // Remova o campo _token dos dados
        unset($dados['_token']);

        /* $cliente recebe os atributos da class Cliente */
        $cliente = new Cliente;

        // Atribuir os valores dos dados ao modelo
        foreach ($dados as $key => $value) {
            $cliente->$key = $value;
        }

        $cliente->save();
        return $cliente;
    }

    public function visualizarCliente($id) {
        $cliente = Cliente::find($id);
        return $cliente;
    }
}
