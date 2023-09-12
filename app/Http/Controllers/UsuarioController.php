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
    $userDados->emailUsuario = $user->email;
    $userDados->estadoRgUsuario = $dados['estadoRgUsuario'];
    $userDados->celularUsuario = $dados['celularUsuario'];
    $userDados->token = Str::random(10);
    $userDados->rgUsuario = $dados['rgUsuario'];
    $userDados->cpfUsuario = $dados['cpfUsuario'];
    $userDados->tipoAcessoUsuario = $dados['tipoAcessoUsuario'];
    // Preencha os outros campos 'user_dados' da mesma maneira

    $userDados->save();

    $token = Password::createToken($user);
    $resetPasswordLink = route('password.reset', [
        'token' => $token,
        'email' => $user->email,
    ]);
    
    Mail::to($user->email)->send(new NovoUsuarioEmail($user, $resetPasswordLink));

    return response()->json($userDados, 201); // Created
}
}
