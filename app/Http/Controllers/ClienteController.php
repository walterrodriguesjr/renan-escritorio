<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    
    public function listarClientes(Request $request)
{
    try {
        $pesquisaClientes = $request->input('search');

        // Inicia a consulta filtrando pela coluna user_id com o ID do usuário logado
        $query = Cliente::where('user_id', Auth::id());

        if ($pesquisaClientes) {
            $query->where(function ($query) use ($pesquisaClientes) {
                $query->where('nomeCliente', 'like', '%' . $pesquisaClientes . '%')
                    ->orWhere('rgCliente', 'like', '%' . $pesquisaClientes . '%')
                    ->orWhere('cpfCliente', 'like', '%' . $pesquisaClientes . '%')
                    ->orWhere('emailCliente', 'like', '%' . $pesquisaClientes . '%')
                    ->orWhere('celularCliente', 'like', '%' . $pesquisaClientes . '%');
            });
        }

        $clientes = $query->get();

        return response()->json($clientes, 200); // 200 OK
    } catch (\Exception $e) {
        return response()->json(['error' => 'Erro ao listar clientes'], 500); // 500 Internal Server Error
    }
}


    public function adicionarCliente(Request $request)
    {
        $dados = $request->json()->all();

        // Remova o campo _token dos dados
        unset($dados['_token']);

        // Validação dos campos obrigatórios e únicos
        $regras = [
            'nomeCliente' => 'required',
            'celularCliente' => 'required',
            'cpfCliente' => 'required|unique:clientes',
            'emailCliente' => 'required|unique:clientes',
        ];

        $mensagens = [
            'nomeCliente.required' => '* O campo nome é obrigatório.',
            'celularCliente.required' => '* O campo celular é obrigatório.',
            'cpfCliente.required' => '* O campo CPF é obrigatório.',
            'cpfCliente.unique' => '* Este CPF já está cadastrado.',
            'emailCliente.required' => '* O campo e-mail é obrigatório.',
            'emailCliente.unique' => '* Este e-mail já está cadastrado.',
        ];

        $validador = Validator::make($dados, $regras, $mensagens);

        if ($validador->fails()) {
            return response()->json(['errors' => $validador->errors()], 400); // Bad Request
        }

        // Criar novo cliente
        $cliente = new Cliente;

        // Atribuir os valores dos dados ao modelo
        foreach ($dados as $key => $value) {
            $cliente->$key = $value;
        }

        // Aqui você atribui o user_id do usuário logado
        $cliente->user_id = Auth::user()->id;

        $cliente->save();

        return response()->json($cliente, 201); // Created
    }

    public function visualizarCliente($id)
    {
        $cliente = Cliente::find($id);
        return $cliente;
    }

    public function editarCliente(Request $request, $id)
    {
        $dados = $request->all();

        $regras = [
            'nomeCliente' => 'required',
            'celularCliente' => 'required',
            'cpfCliente' => 'required|unique:clientes,cpfCliente,' . $id,
            'emailCliente' => 'required|unique:clientes,emailCliente,' . $id,
        ];

        $mensagens = [
            'nomeCliente.required' => '* O campo nome é obrigatório.',
            'celularCliente.required' => '* O campo celular é obrigatório.',
            'cpfCliente.required' => '* O campo CPF é obrigatório.',
            'cpfCliente.unique' => '* Este CPF já está cadastrado.',
            'emailCliente.required' => '* O campo e-mail é obrigatório.',
            'emailCliente.unique' => '* Este e-mail já está cadastrado.',
        ];

        $validador = Validator::make($dados, $regras, $mensagens);

        if ($validador->fails()) {
            return response()->json(['errors' => $validador->errors()], 400); // Bad Request
        }

        $cliente = Cliente::findOrFail($id);

        $cliente->update($dados);

        return response()->json(['message' => 'Cliente atualizado com sucesso']);
    }

    public function deletarCliente($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return $cliente;
    }
}
