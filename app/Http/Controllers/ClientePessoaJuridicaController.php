<?php

namespace App\Http\Controllers;

use App\Models\ClientePessoaJuridica;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ClientePessoaJuridicaController extends Controller
{

    public function listarClientesPessoaJuridica(Request $request)
    {
        try {
            $pesquisaClientesPessoaJuridica = $request->input('search');

        // Inicia a consulta filtrando pela coluna user_id com o ID do usuário logado
        $query = ClientePessoaJuridica::where('user_id', Auth::id());

            if ($pesquisaClientesPessoaJuridica) {
                $query->where(function ($query) use ($pesquisaClientesPessoaJuridica) {
                    $query->where('razaoSocial', 'like', '%' . $pesquisaClientesPessoaJuridica . '%')
                        ->orWhere('cnpj', 'like', '%' . $pesquisaClientesPessoaJuridica . '%')
                        ->orWhere('email', 'like', '%' . $pesquisaClientesPessoaJuridica . '%')
                        ->orWhere('telefone', 'like', '%' . $pesquisaClientesPessoaJuridica . '%');
                });
            }

            $clientes = $query->get();

            return response()->json($clientes, 200); // 200 OK
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar clientes'], 500); // 500 Internal Server Error
        }
    }

    public function adicionarClientePessoaJuridica(Request $request)
    {
        $dados = $request->json()->all();

        // Remova o campo _token dos dados
        unset($dados['_token']);

        // Validação dos campos obrigatórios e únicos
        $regras = [
            /* 'razaoSocial' => 'required', */
            /*  'cnpj' => 'required', */];

        $mensagens = [
            /* 'razaoSocial.required' => '* O campo razão social é obrigatório.', */
            /*   'cnpj.required' => '* O campo CNPJ é obrigatório.',
            'cnpj.unique' => '* Este CNPJ já está cadastrado.', */];

        $validador = Validator::make($dados, $regras, $mensagens);

        if ($validador->fails()) {
            return response()->json(['errors' => $validador->errors()], 400); // Bad Request
        }

        // Criar novo cliente
        $cliente = new ClientePessoaJuridica();

        // Atribuir os valores dos dados ao modelo
        foreach ($dados as $key => $value) {
            $cliente->$key = $value;
        }

        $cliente->user_id = Auth::user()->id;

        $cliente->save();

        return response()->json($cliente, 201); // Created
    }

    public function visualizarClientePessoaJuridica($id)
    {
        $cliente = ClientePessoaJuridica::find($id);
        return $cliente;
    }

    public function editarClientePessoaJuridica(Request $request, $id)
    {
        $dados = $request->all();

        /* $regras = [
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
        ]; */

        /* $validador = Validator::make($dados, $regras, $mensagens);

        if ($validador->fails()) {
            return response()->json(['errors' => $validador->errors()], 400); // Bad Request
        } */

        $cliente = ClientePessoaJuridica::findOrFail($id);

        $cliente->update($dados);

        return response()->json(['message' => 'Cliente atualizado com sucesso']);
    }

    public function deletarClientePessoaJuridica($id)
    {
        $cliente = ClientePessoaJuridica::find($id);
        $cliente->delete();
        return $cliente;
    }
}
