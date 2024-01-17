<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoUsuarioEmail;
use Illuminate\Support\Facades\Password;

class UsuarioController extends Controller
{

    public function listarUsuarios() {
        try {
            $usuarios = UserDados::all();
            return $usuarios;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao listar usuários'], 500); // 500 Internal Server Error
        }
        
    }

    public function visualizarUsuario($id) {
       $usuario = User::find($id);
       $dadosUsuario = $usuario->UserDados;
       return $dadosUsuario;
    }

    public function adicionarUsuario(Request $request)
    {
        $dados = $request->json()->all();

       
        // Validação dos campos obrigatórios e únicos
        $regras = [
            'celularUsuario' => 'required',
            'cpfUsuario' => 'required|unique:user_dados', // Verifica a unicidade na tabela 'user_dados'
        ];

        $mensagens = [
            'celularUsuario.required' => '* O campo celular é obrigatório.',
            'cpfUsuario.required' => '* O campo CPF é obrigatório.',
            'cpfUsuario.unique' => '* Este CPF já está cadastrado.',
        ];

        $validador = Validator::make($dados, $regras, $mensagens);

        if ($validador->fails()) {
            return response()->json(['errors' => $validador->errors()], 400); // Bad Request
        }

        // Crie um novo usuário na tabela 'users'
        $user = new User();
        $user->name = $dados['nomeUsuario'];
        $user->email = $dados['emailUsuario'];
        $senhaTemporaria = Str::random(10);
        $user->password = Hash::make($senhaTemporaria); // Não se esqueça de criptografar a senha

        $user->save();

        // Crie um novo registro na tabela 'user_dados' relacionando-o ao usuário criado
        $userDados = new UserDados();
        $userDados->user_id = $user->id;
        $userDados->nomeUsuario = $user->name;
        $userDados->estadoRgUsuario = $dados['estadoRgUsuario'];
        $userDados->rgUsuario = $dados['rgUsuario'];
        $userDados->cpfUsuario = $dados['cpfUsuario'];
        $userDados->emailUsuario = $user->email;
        $userDados->celularUsuario = $dados['celularUsuario'];
        $userDados->telefoneUsuario = $dados['telefoneUsuario'];
        $userDados->enderecoUsuario = $dados['enderecoUsuario'];
        $userDados->numeroUsuario = $dados['numeroUsuario'];
        $userDados->complementoUsuario = $dados['complementoUsuario'];

        $usuario->userDados->update([
            'nomeUsuario' => $request->input('nomeUsuario'),
            'estadoRgUsuario' => $request->input('estadoRgUsuario'),
            'rgUsuario' => $request->input('rgUsuario'),
            'cpfUsuario' => $request->input('cpfUsuario'),
            'celularUsuario' => $request->input('celularUsuario'),
            'telefoneUsuario' => $request->input('telefoneUsuario'),
            'enderecoUsuario' => $request->input('enderecoUsuario'),
            'numeroUsuario' => $request->input('numeroUsuario'),
            'complementoUsuario' => $request->input('complementoUsuario'),
            'estadoUsuario' => $request->input('estadoUsuario'),
            'cidadeUsuario' => $request->input('cidadeUsuario'),
        ]);
        return $usuario;
    }
}
