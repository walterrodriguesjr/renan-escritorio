<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDados extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'estadoRgUsuario',
        'rgUsuario',
        'cpfUsuario',
        'celularUsuario',
        'telefoneUsuario',
        'enderecoUsuario',
        'numeroUsuario',
        'complementoUsuario',
        'estadoUsuario',
        'cidadeUsuario',
        'tipoAcessoUsuario',
        'token',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // ou 'user_id' se preferir manter o nome da coluna
    }
}
