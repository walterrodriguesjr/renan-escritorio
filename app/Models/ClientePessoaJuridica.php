<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientePessoaJuridica extends Model
{
    use HasFactory;
    protected $table = 'clientesPessoaJuridica';
    protected $fillable = [
        'nomeFantasia',
        'razaoSocial',
        'cnpj',
        'status',
        'cnaePrincipalDescricao',
        'cnaePrincipalCodigo',
        'cep',
        'dataAbertura',
        'ddd',
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
