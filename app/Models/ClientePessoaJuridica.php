<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientePessoaJuridica extends Model
{
    use HasFactory;
    protected $table = 'clientes_pessoa_juridica';
    protected $fillable = [
        'nomeFantasia',
        'razaoSocial',
        'cnpj',
        'status',
        'cnaePrincipalDescricao',
        'cnaePrincipalCodigo',
        'cep',
        'dataAbertura',
        'telefone',
        'email',
        'tipoLogradouro',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'municipio',
        'uf'
    ];
}
