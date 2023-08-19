<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

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

    public function visualizarCliente($id)
    {
        $cliente = Cliente::find($id);
        return $cliente;
    }

    public function editarCliente(Request $request, $id)
    {
        // Validação dos dados recebidos do formulário (se necessário)
        $request->validate([
            'nomeCliente' => 'required|max:255',
            'estadoRgCliente' => 'required|max:255',
            'rgCliente' => 'required|max:255',
            'cpfCliente' => 'required|max:255',
            'emailCliente' => 'required|email|max:255',
            'celularCliente' => 'max:255',
            'telefoneCliente' => 'max:255',
            'enderecoCliente' => 'max:255',
            'numeroCliente' => 'max:255',
            'complementoCliente' => 'max:255',
            'estadoCliente' => 'max:255',
            'cidadeCliente' => 'max:255',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Encontra o cliente pelo ID
        $cliente = Cliente::findOrFail($id);

        // Atualiza os atributos do cliente com os dados do formulário
        $cliente->update([
            'nomeCliente' => $request->input('nomeCliente'),
            'estadoRgCliente' => $request->input('estadoRgCliente'),
            'rgCliente' => $request->input('rgCliente'),
            'cpfCliente' => $request->input('cpfCliente'),
            'emailCliente' => $request->input('emailCliente'),
            'celularCliente' => $request->input('celularCliente'),
            'telefoneCliente' => $request->input('telefoneCliente'),
            'enderecoCliente' => $request->input('enderecoCliente'),
            'numeroCliente' => $request->input('numeroCliente'),
            'complementoCliente' => $request->input('complementoCliente'),
            'estadoCliente' => $request->input('estadoCliente'),
            'cidadeCliente' => $request->input('cidadeCliente'),
            // Adicione outros atributos conforme necessário
        ]);

        // Retorna a resposta da atualização (por exemplo, um JSON de sucesso)
        return response()->json(['message' => 'Cliente atualizado com sucesso']);
    }

    public function deletarCliente($id) {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return $cliente;
    }
}
